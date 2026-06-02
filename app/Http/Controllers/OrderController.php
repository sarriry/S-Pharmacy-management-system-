<?php

namespace App\Http\Controllers;

use App\DataTables\OrdersDataTable;
use App\Http\Requests\StoreOrderRequest;
use App\Jobs\OrderConfirmationJob;
use App\Models\Address;
use App\Models\Area;
use App\Models\Client;
use App\Models\Doctor;
use App\Models\Medicine;
use App\Models\Order;
use App\Models\Pharmacy;
use App\Models\Prescription;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    /**
     * Get logged-in pharmacy record.
     */
    private function currentPharmacy()
    {
        return Pharmacy::where('user_id', auth()->id())->first();
    }

    /**
     * Get logged-in doctor record.
     */
    private function currentDoctor()
    {
        return Doctor::with('user')
            ->where('user_id', auth()->id())
            ->first();
    }

    /**
     * Check if selected doctor is banned.
     */
    private function isDoctorBanned($doctorId): bool
    {
        if (empty($doctorId)) {
            return false;
        }

        return Doctor::where('id', $doctorId)
            ->where(function ($query) {
                $query->where('is_banned', 1)
                    ->orWhereHas('user', function ($userQuery) {
                        $userQuery->whereNotNull('banned_at');
                    });
            })
            ->exists();
    }

    /**
     * Block logged-in banned doctor.
     */
    private function blockBannedLoggedInDoctor()
    {
        $user = auth()->user();

        if ($user && $user->hasRole('doctor')) {
            $doctor = $this->currentDoctor();

            if (!$doctor) {
                return redirect()
                    ->route('orders.index')
                    ->with('error', __('orders.doctor_account_not_found'))
                    ->with('timeout', 5000);
            }

            if ($this->isDoctorBanned($doctor->id)) {
                return redirect()
                    ->route('orders.index')
                    ->with('error', __('orders.doctor_account_banned_cannot_create_orders'))
                    ->with('timeout', 5000);
            }
        }

        return null;
    }

    /**
     * Check if doctor belongs to selected pharmacy.
     */
    private function doctorBelongsToPharmacy($doctorId, $pharmacyId): bool
    {
        if (empty($doctorId)) {
            return true;
        }

        if (empty($pharmacyId)) {
            return false;
        }

        return Doctor::where('id', $doctorId)
            ->where('pharmacy_id', $pharmacyId)
            ->exists();
    }

    /**
     * Get correct pharmacy ID based on logged-in user role.
     */
    private function getCorrectPharmacyId(StoreOrderRequest $request, ?Order $order = null)
    {
        $user = auth()->user();

        if ($user && $user->hasRole('pharmacy')) {
            $pharmacy = $this->currentPharmacy();

            return $pharmacy ? $pharmacy->id : null;
        }

        if ($user && $user->hasRole('doctor')) {
            $doctor = $this->currentDoctor();

            return $doctor ? $doctor->pharmacy_id : null;
        }

        if ($request->filled('pharmacy_id')) {
            return $request->pharmacy_id;
        }

        if ($order) {
            return $order->pharmacy_id;
        }

        return null;
    }

    /**
     * Get correct doctor ID based on logged-in user role.
     */
    private function getCorrectDoctorId(StoreOrderRequest $request, $pharmacyId)
    {
        $user = auth()->user();

        if ($user && $user->hasRole('doctor')) {
            $doctor = $this->currentDoctor();

            return $doctor ? $doctor->id : null;
        }

        if ($request->filled('doctor_id')) {
            return $request->doctor_id;
        }

        return null;
    }

    /**
     * Check if logged-in user can access this order.
     */
    private function canAccessOrder(Order $order): bool
    {
        $user = auth()->user();

        if (!$user) {
            return false;
        }

        if ($user->hasRole('admin')) {
            return true;
        }

        if ($user->hasRole('pharmacy')) {
            $pharmacy = $this->currentPharmacy();

            return $pharmacy && $order->pharmacy_id == $pharmacy->id;
        }

        if ($user->hasRole('doctor')) {
            $doctor = $this->currentDoctor();

            return $doctor && $order->doctor_id == $doctor->id;
        }

        return $order->user_id == $user->id;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(OrdersDataTable $dataTable)
    {
        $user = auth()->user();

        if ($user && $user->hasRole('admin')) {
            $pharmacies = Pharmacy::with('user')->get();
            $doctors = Doctor::with(['user', 'pharmacy'])->get();

        } elseif ($user && $user->hasRole('pharmacy')) {
            $pharmacy = Pharmacy::where('user_id', auth()->id())->firstOrFail();

            $pharmacies = Pharmacy::with('user')
                ->where('id', $pharmacy->id)
                ->get();

            $doctors = Doctor::with(['user', 'pharmacy'])
                ->where('pharmacy_id', $pharmacy->id)
                ->get();

        } elseif ($user && $user->hasRole('doctor')) {
            $doctor = Doctor::with(['user', 'pharmacy'])
                ->where('user_id', auth()->id())
                ->firstOrFail();

            $pharmacies = Pharmacy::with('user')
                ->where('id', $doctor->pharmacy_id)
                ->get();

            $doctors = Doctor::with(['user', 'pharmacy'])
                ->where('id', $doctor->id)
                ->get();

        } else {
            abort(403, __('orders.unauthorized_action'));
        }

        return $dataTable->render('order.index', [
            'pharmacies' => $pharmacies,
            'doctors' => $doctors,
            'medicines' => Medicine::all(),
            'users' => User::all(),
            'clients' => Client::all(),
            'addresses' => Address::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Validate medicine stock before creating or updating order.
     */
    private function validateMedicineStock(array $medicineIds, array $quantities)
    {
        if (empty($medicineIds) || empty($quantities)) {
            return __('orders.select_medicine_and_quantity');
        }

        if (count($medicineIds) !== count($quantities)) {
            return __('orders.each_medicine_must_have_quantity');
        }

        foreach ($medicineIds as $index => $medicineId) {
            $requestedQuantity = (int) ($quantities[$index] ?? 0);

            if ($requestedQuantity < 1) {
                return __('orders.quantity_must_be_at_least_one');
            }

            $medicine = Medicine::find($medicineId);

            if (!$medicine) {
                return __('orders.medicine_not_found');
            }

            if ($requestedQuantity > $medicine->quantity) {
                return __('orders.not_enough_stock_for', [
                    'name' => $medicine->name,
                    'available' => $medicine->quantity,
                    'requested' => $requestedQuantity,
                ]);
            }
        }

        return null;
    }

    private function getOrCreateOrderClient(StoreOrderRequest $request)
    {
        /*
         * Existing client selected from system
         */
        if ($request->client_mode === 'existing') {
            $client = Client::where('user_id', $request->user_id)->first();

            if ($client) {
                return $client;
            }

            /*
             * If user exists but client record does not exist, create client profile.
             */
            $user = User::findOrFail($request->user_id);

            $areaId = $request->area_id ?: Area::query()->value('id');

            return Client::create([
                'user_id' => $user->id,
                'gender' => $request->client_gender ?: 'Male',
                'date_of_birth' => $request->client_date_of_birth ?: now()->subYears(18)->toDateString(),
                'avatar_image' => 'default.png',
                'phone' => $request->client_phone ?: '0000000000',
                'area_id' => $areaId,
                'street_name' => $request->street_name ?: 'Not provided',
                'building_no' => $request->building_no ?: 0,
                'floor_number' => $request->floor_number ?: 0,
                'flat_number' => $request->flat_number ?: 0,
            ]);
        }

        /*
         * New manual client
         */
        $email = $request->client_email;

        if (!$email) {
            $email = 'client_' . time() . '_' . Str::random(6) . '@local.test';
        }

        $user = User::firstOrCreate(
            ['email' => $email],
            [
                'name' => $request->client_name,
                'password' => Hash::make(Str::random(12)),
            ]
        );

        /*
         * If your system uses Spatie roles, this will assign client role safely.
         */
        try {
            if (method_exists($user, 'assignRole') && !$user->hasRole('client')) {
                $user->assignRole('client');
            }
        } catch (\Throwable $e) {
            /*
             * Ignore role error because order creation should continue.
             */
        }

        $areaId = $request->area_id ?: Area::query()->value('id');

        return Client::firstOrCreate(
            ['user_id' => $user->id],
            [
                'gender' => $request->client_gender ?: 'Male',
                'date_of_birth' => $request->client_date_of_birth ?: now()->subYears(18)->toDateString(),
                'avatar_image' => 'default.png',
                'phone' => $request->client_phone ?: '0000000000',
                'area_id' => $areaId,
                'street_name' => $request->street_name ?: 'Not provided',
                'building_no' => $request->building_no ?: 0,
                'floor_number' => $request->floor_number ?: 0,
                'flat_number' => $request->flat_number ?: 0,
            ]
        );
    }

    private function getOrCreateOrderAddress(StoreOrderRequest $request, Client $client)
    {
        /*
         * Use selected existing address if provided.
         * Restriction removed: we no longer block address because it belongs to another client.
         */

        /*
         * Use first existing address of client.
         */
        $existingAddress = Address::where('client_id', $client->id)->first();

        if ($existingAddress) {
            return $existingAddress;
        }

        /*
         * Create address automatically for new/manual client.
         */
        $areaId = $request->area_id ?: Area::query()->value('id');

        return Address::create([
            'client_id' => $client->id,
            'area_id' => $areaId,
            'street_name' => $request->street_name ?: 'Not provided',
            'building_no' => $request->building_no ?: 0,
            'floor_number' => $request->floor_number ?: 0,
            'flat_number' => $request->flat_number ?: 0,
        ]);
    }

    private function makeOrderBill(Order $order)
    {
        $order->load('medicines');

        $items = $order->medicines->map(function ($medicine) {
            $quantity = (int) ($medicine->pivot->quantity ?? 0);
            $unitPrice = (float) $medicine->price;
            $lineTotal = $quantity * $unitPrice;

            return [
                'medicine_name' => $medicine->name,
                'medicine_type' => $medicine->type,
                'quantity' => $quantity,
                'unit_price' => $unitPrice,
                'line_total' => $lineTotal,
            ];
        })->values();

        return [
            'order_id' => $order->id,
            'items' => $items,
            'total_price' => $items->sum('line_total'),
        ];
    }

    /**
     * Generate manual client ID.
     */
    private function generateClientId()
    {
        do {
            /*
             * Your clients.id is manual, not auto increment.
             * This creates a unique numeric client ID automatically.
             */
            $clientId = random_int(100000, 999999999);
        } while (Client::where('id', $clientId)->exists());

        return $clientId;
    }

    /**
     * Store a newly created order.
     */
    public function store(StoreOrderRequest $request)
    {
        $quantity = array_map('intval', $request->input('quantity', []));
        $orderMedicine = $request->input('medicine_id', []);

        /*
         * Keep medicine stock validation only.
         */
        $stockError = $this->validateMedicineStock($orderMedicine, $quantity);

        if ($stockError) {
            return redirect()
                ->route('orders.index')
                ->with('error', $stockError)
                ->with('timeout', 5000);
        }

        try {
            DB::beginTransaction();

            /*
             |--------------------------------------------------------------------------
             | CLIENT: select existing client or create new manual client
             |--------------------------------------------------------------------------
             */

            $client = null;

            /*
             * Existing client selected from system.
             */
            if ($request->filled('user_id')) {
                $client = Client::where('user_id', $request->user_id)->first();

                /*
                 * If user exists but client profile does not exist,
                 * create a client profile with generated manual ID.
                 */
                if (!$client) {
                    $existingUser = User::find($request->user_id);

                    if ($existingUser) {
                        $client = Client::create([
                            'id' => $this->generateClientId(),
                            'user_id' => $existingUser->id,
                            'gender' => $request->client_gender ?: 'Male',
                            'date_of_birth' => $request->client_date_of_birth ?: now()->subYears(18)->toDateString(),
                            'avatar_image' => 'default-avatar.jpg',
                            'phone' => $request->client_phone ?: '0000000000',
                        ]);
                    }
                }
            }

            /*
             * New manual client.
             */
            if (!$client) {
                $email = $request->client_email;

                if (!$email) {
                    $email = 'client_' . time() . '_' . Str::random(6) . '@local.test';
                }

                $user = User::where('email', $email)->first();

                if (!$user) {
                    $user = User::create([
                        'name' => $request->client_name ?: 'Walk-in Client',
                        'email' => $email,
                        'password' => Hash::make(Str::random(12)),
                    ]);

                    /*
                     * Assign client role if your project uses Spatie roles.
                     */
                    try {
                        if (method_exists($user, 'assignRole')) {
                            $user->assignRole('client');
                        }
                    } catch (\Throwable $roleException) {
                        /*
                         * Ignore role error and continue order creation.
                         */
                    }
                }

                $client = Client::where('user_id', $user->id)->first();

                if (!$client) {
                    $client = Client::create([
                        'id' => $this->generateClientId(),
                        'user_id' => $user->id,
                        'gender' => $request->client_gender ?: 'Male',
                        'date_of_birth' => $request->client_date_of_birth ?: now()->subYears(18)->toDateString(),
                        'avatar_image' => 'default-avatar.jpg',
                        'phone' => $request->client_phone ?: '0000000000',
                    ]);
                }
            }

            if (!$client) {
                DB::rollBack();

                return redirect()
                    ->route('orders.index')
                    ->with('error', __('orders.client_could_not_be_created'))
                    ->with('timeout', 5000);
            }

            /*
             |--------------------------------------------------------------------------
             | PHARMACY AND DOCTOR: no restriction
             |--------------------------------------------------------------------------
             */

            $pharmacyId = $request->pharmacy_id ?: Pharmacy::query()->value('id');

            if (!$pharmacyId) {
                DB::rollBack();

                return redirect()
                    ->route('orders.index')
                    ->with('error', __('orders.add_pharmacy_before_creating_order'))
                    ->with('timeout', 5000);
            }

            $doctorId = $request->doctor_id ?: null;

            /*
             |--------------------------------------------------------------------------
             | CREATE ORDER WITHOUT ADDRESS
             |--------------------------------------------------------------------------
             */

            $order = Order::create([
                'user_id' => $client->user_id,
                'pharmacy_id' => $pharmacyId,
                'doctor_id' => $doctorId,
                'creator_type' => $request->creator_type,
                'status' => $request->status,
                'is_insured' => $request->has('is_insured') ? 1 : 0,
                'delivering_address_id' => null,
                'price' => 0,
            ]);

            Order::createOrderMedicine($order, $quantity, $orderMedicine);

            $order->price = Order::totalPrice($quantity, $orderMedicine);
            $order->save();

            /*
             |--------------------------------------------------------------------------
             | BILL GENERATION
             |--------------------------------------------------------------------------
             */

            $order->load('medicines');

            $billItems = $order->medicines->map(function ($medicine) {
                $qty = (int) ($medicine->pivot->quantity ?? 0);
                $unitPrice = (float) $medicine->price;

                return [
                    'medicine_name' => $medicine->name,
                    'medicine_type' => $medicine->type,
                    'quantity' => $qty,
                    'unit_price' => $unitPrice,
                    'line_total' => $qty * $unitPrice,
                ];
            })->values();

            $orderUser = User::find($order->user_id);

            $bill = [
                'order_id' => $order->id,
                'client_id' => $client->id,
                'client_name' => $orderUser ? $orderUser->name : __('orders.unknown_client'),
                'items' => $billItems,
                'total_price' => $billItems->sum('line_total'),
            ];

            DB::commit();

            return redirect()
                ->route('orders.index')
                ->with('success', __('orders.order_created_successfully'))
                ->with('bill', $bill)
                ->with('timeout', 5000);

        } catch (\Throwable $e) {
            DB::rollBack();

            return redirect()
                ->route('orders.index')
                ->with('error', __('orders.error_creating_order_with_message', ['message' => $e->getMessage()]))
                ->with('timeout', 5000);
        }
    }

    /**
     * Display the specified order.
     */
    public function show($id)
    {
        try {
            if (!is_numeric($id)) {
                return response()->json([
                    'message' => __('orders.invalid_order_id'),
                    'received_id' => $id,
                ], 422);
            }

            $order = Order::with('medicines')->find($id);

            if (!$order) {
                return response()->json([
                    'message' => __('orders.order_not_found'),
                    'received_id' => $id,
                ], 404);
            }

            if (!$this->canAccessOrder($order)) {
                return response()->json([
                    'message' => __('orders.unauthorized_action'),
                ], 403);
            }

            $orderUser = User::find($order->user_id);

            $pharmacy = Pharmacy::with('user')
                ->where('id', $order->pharmacy_id)
                ->first();

            $doctor = Doctor::with('user')
                ->where('id', $order->doctor_id)
                ->first();

            $address = null;
            $area = null;
            $area = $address ? Area::find($address->area_id) : null;
            $prescriptions = Prescription::where('order_id', $order->id)->get();

            $orderedMedicines = $order->medicines->map(function ($medicine) {
                $quantity = (int) ($medicine->pivot->quantity ?? 0);
                $unitPrice = (float) $medicine->price;

                return [
                    'id' => $medicine->id,
                    'name' => $medicine->name,
                    'type' => $medicine->type,
                    'quantity' => $quantity,
                    'unit_price' => $unitPrice,
                    'line_total' => $quantity * $unitPrice,
                ];
            })->values();

            $bill = [
                'order_id' => $order->id,
                'items' => $orderedMedicines,
                'total_price' => $orderedMedicines->sum('line_total'),
            ];

            return response()->json([
                'order' => $order,
                'user' => $orderUser,
                'pharmacy' => $pharmacy,
                'pharmacy_owner' => $pharmacy ? $pharmacy->user : null,
                'doctor' => $doctor,
                'doctor_user' => $doctor ? $doctor->user : null,
                'doctor_name' => $doctor && $doctor->user ? $doctor->user->name : null,
                'address' => $address,
                'area' => $area,
                'prescriptions' => $prescriptions,
                'medicines' => $orderedMedicines,
                'bill' => $bill,
            ]);

        } catch (\Throwable $e) {
            return response()->json([
                'message' => __('orders.server_error_loading_order_information'),
                'real_error' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile(),
            ], 500);
        }
    }

    /**
     * Confirm order by order user.
     */
    public function confirm($id)
    {
        $order = Order::findOrFail($id);

        if ($order->user_id !== auth()->id()) {
            abort(403);
        }

        if ($order->status === 'WaitingForUserConfirmation') {
            $order->update([
                'status' => 'Confirmed',
            ]);

            return view('actions.confirm', [
                'order' => $order,
                'state' => 'Confirmed',
            ]);
        }

        return view('actions.confirm', [
            'order' => $order,
            'state' => $order->status,
        ]);
    }

    /**
     * Show order edit page.
     */
    public function edit($id)
    {
        $order = Order::with('medicines')->findOrFail($id);

        if (!$this->canAccessOrder($order)) {
            abort(403, __('orders.unauthorized_action'));
        }

        $orderUser = User::find($order->user_id);

        $pharmacy = Pharmacy::with('user')
            ->where('id', $order->pharmacy_id)
            ->first();

        $doctor = Doctor::with('user')
            ->where('id', $order->doctor_id)
            ->first();

        $doctors = Doctor::with('user')
            ->where('pharmacy_id', $order->pharmacy_id)
            ->get();

        return view('order.edit', [
            'order' => $order,
            'user' => $orderUser,
            'pharmacy' => $pharmacy,
            'doctor' => $doctor,
            'doctors' => $doctors,
        ]);
    }

    /**
     * Update the specified order.
     */
    public function update(StoreOrderRequest $request, $id)
    {
        /*
         * Also block banned doctor from updating order.
         */
        $blockedDoctorResponse = $this->blockBannedLoggedInDoctor();

        if ($blockedDoctorResponse) {
            return $blockedDoctorResponse;
        }

        if (!is_numeric($id)) {
            return redirect()
                ->route('orders.index')
                ->with('error', __('orders.invalid_order_id'))
                ->with('timeout', 5000);
        }

        $order = Order::find($id);

        if (!$order) {
            return redirect()
                ->route('orders.index')
                ->with('error', __('orders.order_not_found'))
                ->with('timeout', 5000);
        }

        if (!$this->canAccessOrder($order)) {
            abort(403, __('orders.unauthorized_action'));
        }

        $pharmacyId = $this->getCorrectPharmacyId($request, $order);

        if (!$pharmacyId) {
            return redirect()
                ->route('orders.index')
                ->with('error', __('orders.selected_pharmacy_not_found'))
                ->with('timeout', 5000);
        }

        $pharmacy = Pharmacy::find($pharmacyId);

        if (!$pharmacy) {
            return redirect()
                ->route('orders.index')
                ->with('error', __('orders.selected_pharmacy_not_found'))
                ->with('timeout', 5000);
        }

        $doctorId = $this->getCorrectDoctorId($request, $pharmacyId);

        if ($this->isDoctorBanned($doctorId)) {
            return to_route('orders.index')
                ->with('error', __('orders.doctor_banned_cannot_update_orders'))
                ->with('timeout', 5000);
        }

        if (!$this->doctorBelongsToPharmacy($doctorId, $pharmacyId)) {
            return to_route('orders.index')
                ->with('error', __('orders.doctor_does_not_work_in_this_pharmacy'))
                ->with('timeout', 5000);
        }

        $editedQuantity = array_map('intval', $request->input('quantity', []));
        $editedOrderMedicine = $request->input('medicine_id', []);

        $stockError = $this->validateMedicineStock($editedOrderMedicine, $editedQuantity);

        if ($stockError) {
            return redirect()
                ->route('orders.index')
                ->with('error', $stockError)
                ->with('timeout', 5000);
        }

        try {
            $order->update([
                'pharmacy_id' => $pharmacyId,
                'doctor_id' => $doctorId,
                'status' => 'WaitingForUserConfirmation',
            ]);

            try {
                Order::updateOrderMedicine($order, $editedQuantity, $editedOrderMedicine);

                $order->price = Order::totalPrice($editedQuantity, $editedOrderMedicine);
                $order->save();

                if ($order->status == 'WaitingForUserConfirmation') {
                    $orderUser = User::where('id', $order->user_id)->first();

                    if ($orderUser) {
                        dispatch(new OrderConfirmationJob($orderUser, $order));
                    }
                }

            } catch (\ErrorException $e) {
                return redirect()
                    ->route('orders.index')
                    ->with('error', __('orders.error_no_medicine_with_this_name'))
                    ->with('timeout', 5000);
            }

        } catch (\Illuminate\Database\QueryException $exception) {
            return redirect()
                ->route('orders.index')
                ->with('error', __('orders.error_updating_order'))
                ->with('timeout', 5000);

        } catch (\Throwable $e) {
            return redirect()
                ->route('orders.index')
                ->with('error', __('orders.error_updating_order_with_message', ['message' => $e->getMessage()]))
                ->with('timeout', 5000);
        }

        return redirect()
            ->route('orders.index')
            ->with('success', __('orders.order_updated_successfully'))
            ->with('timeout', 5000);
    }

    /**
     * Accept order and reduce stock.
     */
    public function accept(Order $order)
    {
        if (!$this->canAccessOrder($order)) {
            abort(403, __('orders.unauthorized_action'));
        }

        if ($order->status !== 'WaitingForUserConfirmation') {
            return redirect()
                ->route('orders.index')
                ->with('error', __('orders.only_waiting_orders_can_be_accepted'))
                ->with('timeout', 5000);
        }

        try {
            DB::transaction(function () use ($order) {
                $order->load('medicines');

                foreach ($order->medicines as $medicine) {
                    $requestedQuantity = (int) ($medicine->pivot->quantity ?? 0);

                    $freshMedicine = Medicine::lockForUpdate()->find($medicine->id);

                    if (!$freshMedicine) {
                        throw new \Exception(__('orders.medicine_not_found'));
                    }

                    if ($requestedQuantity > $freshMedicine->quantity) {
                        throw new \Exception(__('orders.not_enough_stock_for_order', [
                            'name' => $freshMedicine->name,
                            'available' => $freshMedicine->quantity,
                            'needed' => $requestedQuantity,
                        ]));
                    }

                    $freshMedicine->quantity = $freshMedicine->quantity - $requestedQuantity;
                    $freshMedicine->save();
                }

                $order->update([
                    'status' => 'Delivered',
                ]);
            });

            return redirect()
                ->route('orders.index')
                ->with('success', __('orders.order_accepted_stock_reduced'))
                ->with('timeout', 5000);

        } catch (\Exception $e) {
            return redirect()
                ->route('orders.index')
                ->with('error', $e->getMessage())
                ->with('timeout', 5000);
        }
    }

    /**
     * Cancel waiting order.
     */
    public function cancel(Order $order)
    {
        if (!$this->canAccessOrder($order)) {
            abort(403, __('orders.unauthorized_action'));
        }

        if ($order->status !== 'WaitingForUserConfirmation') {
            return redirect()
                ->route('orders.index')
                ->with('error', __('orders.only_waiting_orders_can_be_cancelled'))
                ->with('timeout', 5000);
        }

        $order->update([
            'status' => 'Canceled',
        ]);

        return redirect()
            ->route('orders.index')
            ->with('success', __('orders.order_cancelled_successfully'))
            ->with('timeout', 5000);
    }

    /**
     * Delete order.
     */
    public function destroy($id)
    {
        $order = Order::with('medicines')->find($id);

        if (!$order) {
            return to_route('orders.index')
                ->with('error', __('orders.order_not_found'))
                ->with('timeout', 5000);
        }

        if (!$this->canAccessOrder($order)) {
            abort(403, __('orders.unauthorized_action'));
        }

        $order->medicines()->detach();

        Prescription::where('order_id', $id)->delete();

        $order->delete();

        return to_route('orders.index')
            ->with('success', __('orders.order_deleted_successfully'))
            ->with('timeout', 5000);
    }

    /**
     * Cancel order from action link.
     */
    public function updatestatus($order_id)
    {
        $order = Order::findOrFail($order_id);

        if ($order->user_id !== auth()->id()) {
            abort(403);
        }

        if ($order->status === 'WaitingForUserConfirmation') {
            $order->update([
                'status' => 'Canceled',
            ]);

            return view('actions.cancel', [
                'order' => $order,
                'state' => 'Canceled',
            ]);
        }

        return view('actions.cancel', [
            'order' => $order,
            'state' => $order->status,
        ]);
    }
}
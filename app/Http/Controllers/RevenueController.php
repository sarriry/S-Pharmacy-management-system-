<?php

namespace App\Http\Controllers;

use App\DataTables\RevenuesDataTable;
use App\Models\Doctor;
use App\Models\Medicine;
use App\Models\Order;
use App\Models\Pharmacy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RevenueController extends Controller
{
    public function index(RevenuesDataTable $dataTable)
    {
        $user = Auth::user();

        /*
         * Fix:
         * If user is not logged in, Auth::user() becomes null.
         * So we must check it before calling hasRole().
         */
        if (!$user) {
            return redirect()->route('login');
        }

        if ($user->hasRole('admin')) {
            return $dataTable->render('revenue.index');
        }

        if ($user->hasRole('pharmacy')) {
            $pharmacy = Pharmacy::where('user_id', $user->id)->firstOrFail();

            $ordersQuery = Order::where('pharmacy_id', $pharmacy->id)
                ->where('status', 'Delivered');

            $totalOrders = (clone $ordersQuery)->count();
            $totalRevenue = (clone $ordersQuery)->sum('price');

            return view('revenue.index', [
                'pharmacy' => $pharmacy,
                'orders' => $totalOrders,
                'revenues' => $totalRevenue,
            ]);
        }

        abort(403, 'Unauthorized action.');
    }

    public function doctorMedicineRevenue(Request $request)
    {
        $user = Auth::user();

        /*
         * Fix:
         * Never call $user->hasRole() before checking $user.
         */
        if (!$user) {
            return redirect()->route('login');
        }

        if (!$user->hasRole('admin') && !$user->hasRole('pharmacy')) {
            abort(403, 'Unauthorized action.');
        }

        $selectedDoctorId = $request->input('doctor_id');
        $selectedMedicineId = $request->input('medicine_id');
        $fromDate = $request->input('from_date');
        $toDate = $request->input('to_date');

        /*
        |--------------------------------------------------------------------------
        | Dropdown Queries
        |--------------------------------------------------------------------------
        */
        $doctorQuery = Doctor::with(['user', 'pharmacy']);

        /*
        |--------------------------------------------------------------------------
        | Orders Query
        |--------------------------------------------------------------------------
        */
        $ordersQuery = Order::with('medicines')
            ->whereNotNull('doctor_id');

        /*
        |--------------------------------------------------------------------------
        | Pharmacy Role Restriction
        |--------------------------------------------------------------------------
        */
        if ($user->hasRole('pharmacy')) {
            $pharmacy = Pharmacy::where('user_id', $user->id)->firstOrFail();

            $doctorQuery->where('pharmacy_id', $pharmacy->id);
            $ordersQuery->where('pharmacy_id', $pharmacy->id);
        }

        /*
        |--------------------------------------------------------------------------
        | Filters
        |--------------------------------------------------------------------------
        */
        if ($request->filled('doctor_id')) {
            $ordersQuery->where('doctor_id', $selectedDoctorId);
        }

        if ($request->filled('medicine_id')) {
            $ordersQuery->whereHas('medicines', function ($query) use ($selectedMedicineId) {
                $query->where('medicines.id', $selectedMedicineId);
            });
        }

        if ($request->filled('from_date')) {
            $ordersQuery->whereDate('created_at', '>=', $fromDate);
        }

        if ($request->filled('to_date')) {
            $ordersQuery->whereDate('created_at', '<=', $toDate);
        }

        /*
        |--------------------------------------------------------------------------
        | Dropdown Data
        |--------------------------------------------------------------------------
        */
        $doctors = $doctorQuery
            ->get()
            ->sortBy(function ($doctor) {
                return optional($doctor->user)->name;
            })
            ->values();

        $medicines = Medicine::orderBy('name')->get();

        /*
        |--------------------------------------------------------------------------
        | Report Orders
        |--------------------------------------------------------------------------
        */
        $orders = $ordersQuery
            ->latest()
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Manual Doctor / Pharmacy Mapping
        |--------------------------------------------------------------------------
        */
        $doctorIds = $orders
            ->pluck('doctor_id')
            ->filter()
            ->unique()
            ->values();

        $pharmacyIds = $orders
            ->pluck('pharmacy_id')
            ->filter()
            ->unique()
            ->values();

        $doctorMap = Doctor::with('user')
            ->whereIn('id', $doctorIds)
            ->get()
            ->keyBy('id');

        $pharmacyMap = Pharmacy::whereIn('id', $pharmacyIds)
            ->get()
            ->keyBy('id');

        $reportRows = collect();

        foreach ($orders as $order) {
            foreach ($order->medicines as $medicine) {

                if ($request->filled('medicine_id') && (string) $medicine->id !== (string) $selectedMedicineId) {
                    continue;
                }

                $quantity = (int) ($medicine->pivot->quantity ?? 0);
                $unitPrice = (float) ($medicine->price ?? 0);
                $totalRevenue = $quantity * $unitPrice;

                $doctor = $doctorMap->get($order->doctor_id);
                $pharmacy = $pharmacyMap->get($order->pharmacy_id);

                $reportRows->push([
                    'order_id' => $order->id,
                    'order_date' => optional($order->created_at)->format('Y-m-d'),
                    'doctor_id' => $order->doctor_id,
                    'doctor_name' => $doctor && $doctor->user ? $doctor->user->name : 'N/A',
                    'pharmacy_name' => $pharmacy ? ($pharmacy->pharmacy_name ?? 'N/A') : 'N/A',
                    'medicine_id' => $medicine->id,
                    'medicine_name' => $medicine->name ?? 'N/A',
                    'medicine_type' => $medicine->type ?? 'N/A',
                    'quantity' => $quantity,
                    'unit_price' => $unitPrice,
                    'total_revenue' => $totalRevenue,
                    'order_status' => $order->status,
                ]);
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Summary
        |--------------------------------------------------------------------------
        */
        $summary = [
            'total_orders' => $reportRows->pluck('order_id')->unique()->count(),
            'total_quantity' => $reportRows->sum('quantity'),
            'total_revenue' => $reportRows->sum('total_revenue'),
        ];

        return view('revenue.doctor-medicine-revenue', [
            'doctors' => $doctors,
            'medicines' => $medicines,
            'reportRows' => $reportRows,
            'summary' => $summary,
            'selectedDoctorId' => $selectedDoctorId,
            'selectedMedicineId' => $selectedMedicineId,
            'fromDate' => $fromDate,
            'toDate' => $toDate,
        ]);
    }
}
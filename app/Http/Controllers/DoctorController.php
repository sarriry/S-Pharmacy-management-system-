<?php

namespace App\Http\Controllers;

use App\DataTables\DoctorsDataTable;
use App\Http\Requests\StoreDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;
use App\Models\Doctor;
use App\Models\Pharmacy;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DoctorController extends Controller
{
    /**
     * Get logged-in pharmacy account.
     */
    private function currentPharmacy()
    {
        return Pharmacy::where('user_id', auth()->id())->first();
    }

    /**
     * Check if logged-in user can access a doctor.
     */
    private function canAccessDoctor(Doctor $doctor): bool
    {
        $user = auth()->user();

        if ($user->hasRole('admin')) {
            return true;
        }

        if ($user->hasRole('pharmacy')) {
            $pharmacy = $this->currentPharmacy();

            return $pharmacy && $doctor->pharmacy_id == $pharmacy->id;
        }

        if ($user->hasRole('doctor')) {
            return $doctor->user_id == $user->id;
        }

        return false;
    }

    /**
     * Display doctors list.
     */
    public function index(DoctorsDataTable $dataTable)
    {
        $user = auth()->user();

        if ($user->hasRole('admin')) {

            // Admin can see all pharmacies and all doctors.
            $pharmacies = Pharmacy::with('user')->get();
            $doctors = Doctor::with(['user', 'pharmacy'])->get();

        } elseif ($user->hasRole('pharmacy')) {

            // Pharmacy can see only its own pharmacy and its own doctors.
            $pharmacy = Pharmacy::where('user_id', auth()->id())->firstOrFail();

            $pharmacies = Pharmacy::with('user')
                ->where('id', $pharmacy->id)
                ->get();

            $doctors = Doctor::with(['user', 'pharmacy'])
                ->where('pharmacy_id', $pharmacy->id)
                ->get();

        } elseif ($user->hasRole('doctor')) {

            // Doctor can see only himself and his own pharmacy.
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
            abort(403, 'Unauthorized action.');
        }

        return $dataTable->render('doctor.index', [
            'pharmacies' => $pharmacies,
            'doctors' => $doctors,
        ]);
    }

    /**
     * Store new doctor.
     */
    public function store(StoreDoctorRequest $request)
    {
        $authUser = auth()->user();

        if (!$authUser->hasRole('admin') && !$authUser->hasRole('pharmacy')) {
            abort(403, 'Unauthorized action.');
        }

        try {
            $pharmacyId = $request->pharmacy_id;

            // Pharmacy user can create doctor only in his own pharmacy.
            if ($authUser->hasRole('pharmacy')) {
                $pharmacy = Pharmacy::where('user_id', auth()->id())->firstOrFail();
                $pharmacyId = $pharmacy->id;
            }

            if (!Pharmacy::where('id', $pharmacyId)->exists()) {
                return redirect()
                    ->route('doctors.index')
                    ->with('error', 'Selected pharmacy was not found!')
                    ->with('timeout', 5000);
            }

            if ($request->hasFile('avatar_image')) {
                $avatar = $request->file('avatar_image');
                $avatarName = $avatar->getClientOriginalName();
                $avatar->storeAs('public/doctors_Images', $avatarName);
            } else {
                $avatarName = 'default-avatar.jpg';
            }

            DB::transaction(function () use ($request, $pharmacyId, $avatarName) {
                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]);

                $doctor = Doctor::create([
                    'user_id' => $user->id,
                    'id' => $request->id,
                    'pharmacy_id' => $pharmacyId,
                    'is_banned' => $request->has('is_banned') ? 1 : 0,
                    'avatar_image' => $avatarName,
                ]);

                $user->assignRole('doctor');

                if ($request->has('is_banned')) {
                    $doctor->user->ban([
                        'comment' => 'Enjoy your ban!',
                    ]);

                    $doctor->user->update([
                        'banned_at' => now(),
                    ]);
                }
            });

            return redirect()
                ->route('doctors.index')
                ->with('success', 'Doctor has been created successfully!')
                ->with('timeout', 5000);

        } catch (\Illuminate\Database\QueryException $exception) {
            return redirect()
                ->route('doctors.index')
                ->with('error', 'Error in Creating Doctor!')
                ->with('timeout', 5000);

        } catch (\Throwable $e) {
            return redirect()
                ->route('doctors.index')
                ->with('error', 'Error in Creating Doctor! ' . $e->getMessage())
                ->with('timeout', 5000);
        }
    }

    /**
     * Delete doctor.
     */
    public function destroy($id)
    {
        if (!is_numeric($id)) {
            return to_route('doctors.index')
                ->with('error', 'Invalid doctor ID.')
                ->with('timeout', 5000);
        }

        try {
            $doctor = Doctor::with(['user', 'pharmacy'])
                ->where('id', $id)
                ->firstOrFail();

            if (!$this->canAccessDoctor($doctor)) {
                abort(403, 'Unauthorized action.');
            }

            // Doctor cannot delete himself.
            if (auth()->user()->hasRole('doctor')) {
                abort(403, 'Unauthorized action.');
            }

            $doctor->delete();

            return to_route('doctors.index')
                ->with('success', 'Doctor has been deleted successfully!')
                ->with('timeout', 5000);

        } catch (\Illuminate\Database\QueryException $exception) {
            return to_route('doctors.index')
                ->with('error', 'Delete related records first')
                ->with('timeout', 5000);

        } catch (\Throwable $e) {
            return to_route('doctors.index')
                ->with('error', 'Error in deleting doctor! ' . $e->getMessage())
                ->with('timeout', 5000);
        }
    }

    /**
     * Show doctor information.
     */
    public function show($id)
    {
        try {
            $doctor = Doctor::with(['user', 'pharmacy'])
                ->where('id', $id)
                ->first();

            if (!$doctor) {
                return response()->json([
                    'message' => 'Doctor not found.',
                ], 404);
            }

            if (!$this->canAccessDoctor($doctor)) {
                return response()->json([
                    'message' => 'Unauthorized action.',
                ], 403);
            }

            return response()->json([
                'doctor' => $doctor,
                'user' => $doctor->user,
                'pharmacy' => $doctor->pharmacy,
            ]);

        } catch (\Throwable $e) {
            return response()->json([
                'message' => 'Server error while loading doctor information.',
                'real_error' => $e->getMessage(),
                'line' => $e->getLine(),
            ], 500);
        }
    }

    /**
     * Update doctor.
     */
    public function update(UpdateDoctorRequest $request, $doctor)
    {
        if (!is_numeric($doctor)) {
            return redirect()
                ->route('doctors.index')
                ->with('error', 'Invalid doctor ID.')
                ->with('timeout', 5000);
        }

        try {
            $selectedDoctor = Doctor::with(['user', 'pharmacy'])
                ->where('id', $doctor)
                ->firstOrFail();

            if (!$this->canAccessDoctor($selectedDoctor)) {
                abort(403, 'Unauthorized action.');
            }

            $authUser = auth()->user();
            $selectedUser = $selectedDoctor->user;

            if (!$selectedUser) {
                return redirect()
                    ->route('doctors.index')
                    ->with('error', 'Doctor user account was not found!')
                    ->with('timeout', 5000);
            }

            $selectedUser->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);

            if ($request->filled('password')) {
                $selectedUser->update([
                    'password' => Hash::make($request->password),
                ]);
            }

            if ($request->hasFile('avatar_image')) {
                if ($selectedDoctor->avatar_image && $selectedDoctor->avatar_image != 'default-avatar.jpg') {
                    Storage::delete('public/doctors_Images/' . $selectedDoctor->avatar_image);
                }

                $avatar = $request->file('avatar_image');
                $avatarName = $avatar->getClientOriginalName();
                $avatar->storeAs('public/doctors_Images', $avatarName);
            } else {
                $avatarName = $selectedDoctor->avatar_image;
            }

            if ($authUser->hasRole('admin')) {

                // Admin can change national ID, pharmacy, ban status, and avatar.
                $nationalID = $request->id;
                $pharmacyId = $request->pharmacy_id;
                $ban = $request->has('is_banned') ? 1 : 0;

            } elseif ($authUser->hasRole('pharmacy')) {

                // Pharmacy can update only doctors inside its own pharmacy.
                $pharmacy = Pharmacy::where('user_id', auth()->id())->firstOrFail();

                $nationalID = $request->id;
                $pharmacyId = $pharmacy->id;
                $ban = $request->has('is_banned') ? 1 : 0;

            } elseif ($authUser->hasRole('doctor')) {

                // Doctor cannot change national ID, pharmacy, or ban status.
                $nationalID = $selectedDoctor->id;
                $pharmacyId = $selectedDoctor->pharmacy_id;
                $ban = $selectedDoctor->is_banned;

            } else {
                abort(403, 'Unauthorized action.');
            }

            if (!Pharmacy::where('id', $pharmacyId)->exists()) {
                return redirect()
                    ->route('doctors.index')
                    ->with('error', 'Selected pharmacy was not found!')
                    ->with('timeout', 5000);
            }

            $selectedDoctor->update([
                'id' => $nationalID,
                'pharmacy_id' => $pharmacyId,
                'is_banned' => $ban,
                'avatar_image' => $avatarName,
            ]);

            if ($authUser->hasRole('admin') || $authUser->hasRole('pharmacy')) {
                if ($ban == 1) {
                    $selectedDoctor->user->ban([
                        'comment' => 'Enjoy your ban!',
                    ]);

                    $selectedDoctor->user->update([
                        'banned_at' => now(),
                    ]);
                } else {
                    $selectedDoctor->user->unban();

                    $selectedDoctor->user->update([
                        'banned_at' => null,
                    ]);
                }
            }

            return redirect()
                ->route('doctors.index')
                ->with('success', 'Doctor has been updated successfully!')
                ->with('timeout', 5000);

        } catch (\Illuminate\Database\QueryException $exception) {
            return redirect()
                ->route('doctors.index')
                ->with('error', 'Error in Updating Doctor!')
                ->with('timeout', 5000);

        } catch (\Throwable $e) {
            return redirect()
                ->route('doctors.index')
                ->with('error', 'Error in Updating Doctor! ' . $e->getMessage())
                ->with('timeout', 5000);
        }
    }

    /**
     * Ban doctor.
     */
    public function ban(Doctor $doctor)
    {
        if (auth()->user()->hasRole('doctor')) {
            abort(403, 'Unauthorized action.');
        }

        if (!$this->canAccessDoctor($doctor)) {
            abort(403, 'Unauthorized action.');
        }

        $doctor->user->ban([
            'comment' => 'Enjoy your ban!',
        ]);

        $doctor->update([
            'is_banned' => 1,
        ]);

        $doctor->user->update([
            'banned_at' => now(),
        ]);

        return redirect()
            ->back()
            ->with('success', 'Doctor has been banned successfully!')
            ->with('timeout', 5000);
    }

    /**
     * Unban doctor.
     */
    public function unban(Doctor $doctor)
    {
        if (auth()->user()->hasRole('doctor')) {
            abort(403, 'Unauthorized action.');
        }

        if (!$this->canAccessDoctor($doctor)) {
            abort(403, 'Unauthorized action.');
        }

        $doctor->user->unban();

        $doctor->update([
            'is_banned' => 0,
        ]);

        $doctor->user->update([
            'banned_at' => null,
        ]);

        return redirect()
            ->back()
            ->with('success', 'Doctor has been unbanned successfully!')
            ->with('timeout', 5000);
    }
}
<?php

namespace App\Http\Controllers;

use App\DataTables\MedicinesDataTable;
use App\Http\Requests\StoreMedicineRequest;
use App\Models\Medicine;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(MedicinesDataTable $dataTable)
    {
        $today = now()->toDateString();
        $warningDate = now()->addDays(30)->toDateString();

        $expiredMedicines = Medicine::whereNotNull('expiration_date')
            ->whereDate('expiration_date', '<', $today)
            ->orderBy('expiration_date')
            ->get();

        $expiringMedicines = Medicine::whereNotNull('expiration_date')
            ->whereDate('expiration_date', '>=', $today)
            ->whereDate('expiration_date', '<=', $warningDate)
            ->orderBy('expiration_date')
            ->get();

        return $dataTable->render('medicine.index', [
            'expiredMedicines' => $expiredMedicines,
            'expiringMedicines' => $expiringMedicines,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMedicineRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMedicineRequest $request)
    {
        Medicine::create($request->validated());

        return to_route('medicines.index')
            ->with('success', __('medicine.medicine_added_successfully'))
            ->with('timeout', 5000);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $medicine = Medicine::where('id', $id)->get();

        return response()->json([
            'medicine' => $medicine,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response|null
     */
    public function edit($id)
    {
        if (is_numeric($id)) {
            $medicine = Medicine::where('id', $id)->first();

            return view('medicine.edit', [
                'medicine' => $medicine,
            ]);
        }

        return null;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreMedicineRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response|null
     */
    public function update(StoreMedicineRequest $request, $id)
    {
        if (is_numeric($id)) {
            Medicine::where('id', $id)->update($request->validated());

            return to_route('medicines.index')
                ->with('success', __('medicine.medicine_updated_successfully'))
                ->with('timeout', 5000);
        }

        return null;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response|null
     */
    public function destroy($id)
    {
        if (is_numeric($id)) {
            try {
                Medicine::where('id', $id)->delete();
            } catch (\Illuminate\Database\QueryException $exception) {
                return to_route('medicines.index')
                    ->with('error', __('medicine.medicine_delete_restricted'))
                    ->with('timeout', 5000);
            }

            return to_route('medicines.index');
        }

        return null;
    }
}
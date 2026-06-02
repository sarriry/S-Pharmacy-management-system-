<?php

namespace App\Http\Controllers;

use App\DataTables\AddressesDataTable;
use App\Http\Requests\StoreAddressRequest;
use App\Models\Address;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class AddressController extends Controller
{
    public function index(AddressesDataTable $dataTable)
    {
        return $dataTable->render('addresses.index');
    }

    public function store(StoreAddressRequest $request)
    {
        try {
                    // Log the incoming request data for debugging
        Log::info('Request data: ', $request->all());

        // Check if client_id is provided in the request
        if (!$request->has('client_id') || is_null($request->client_id)) {
            return response()->json(['error' => 'Client ID is required'], 400);
        }



            $addressData = [];
           
            
            $addressData['client_id'] = $request->client_id;
            $addressData['is_main'] = 0;
            if ($request->has('is_main')) {
                $addressData['is_main'] = 1;
            }
            $addressData['area_id'] = $request->area_id;
            $addressData['street_name'] = $request->street_name;
            $addressData['building_number'] = $request->building_number;
            $addressData['floor_number'] = $request->floor_number;
            $addressData['flat_number'] = $request->flat_number;
            Address::create($addressData);
        } catch (\Illuminate\Database\QueryException $exception) {
    dd($exception->getMessage());
}
        return to_route('clients.index')->with('success', 'Address has been created successfully!')->with('timeout', 3000);
    }

    public function update(StoreAddressRequest $request, $id)
    {
        if (is_numeric($id)) {
            try {
                $address = Address::where('id', '=', $id)->first();
                $addressData = [];
                // handle checkbox
                $addressData['is_main'] = 0;
                if ($request->has('is_main')) {
                    $addressData['is_main'] = 1;
                }
                $addressData['area_id'] = $request->area_id;
                $addressData['street_name'] = $request->street_name;
                $addressData['building_number'] = $request->building_number;
                $addressData['floor_number'] = $request->floor_number;
                $addressData['flat_number'] = $request->flat_number;
                $address->update($addressData);
            } catch (\Illuminate\Database\QueryException $exception) {
                return to_route('clients.index')->with('error', 'Error in Updating Address Record.')->with('timeout', 3000);
            }
            return to_route('clients.index')->with('success', 'Address Record Updated Successfully.')->with('timeout', 3000);
        }
    }

public function show($id)
{
    $client = Client::with(['user', 'addresses.area'])->findOrFail($id);

    return response()->json([
        'client' => $client,
        'user' => $client->user,
        'addresses' => $client->addresses->map(function ($address) {
            return [
                'area_id' => $address->area_id,
                'area_name' => $address->area->name ?? '',
                'street_name' => $address->street_name,
                'building_number' => $address->building_number,
                'floor_number' => $address->floor_number,
                'flat_number' => $address->flat_number,
                'is_main' => $address->is_main,
            ];
        })
    ]);
}
    public function destroy($id)
    {
        //dd($id);
        if (is_numeric($id)) {
            try {
                Address::where('id', $id)->delete();
            } catch (\Illuminate\Database\QueryException $exception) {
                return to_route('clients.index')->with('error', 'Error in Deleting Address Record.')->with('timeout', 5000);;
            }
            return to_route('clients.index')->with('success', 'Address Record Deleted Successfully.')->with('timeout', 5000);;
        }
    }
}

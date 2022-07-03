<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\vehicledetails;

class vehicle extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return array
     */
    public function index1(): array
    {
        $driver = vehicledetails::all();
        return ([
            'status' => 200,
            'company' => $driver
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $driver = new vehicledetails;
        $driver->Driver_Name = $request->Input('name');
        $driver->Driver_Address = $request->Input('address');
        $driver->Driver_Number = $request->Input('contact_no');
        $driver->Driver_Email = $request->Input('email');
        $driver->save();

        return response()->json([
            'status' => 200,
            'message' => 'Student added successfully',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return
     */
    public function show($id)
    {
        return vehicledetails::where('id', $id)->get();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, string $id)
    {
        $driver = vehicledetails::find($id);
        $driver->Vehicle_type = $request->Input('vehicle_type');
        $driver->Vehicle_brand = $request->Input('vehicle_brand');
        $driver->Vehicle_color = $request->Input('vehicle_color');
        $driver->Vehicle_Number = $request->Input('vehicle_number');
        $driver->Number_of_passenger = $request->Input('numberofpassenger');
        $driver->save();

        return response()->json([
            'status' => 200,
            'message' => 'Student added successfully',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $Company = vehicledetails::find($id);
        $Company->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Student deleted successfully',
        ]);
    }

    /**
     * Search for a name
     *
     * @param  int  $id
     * @return array
     */
    public function search($id): array
    {
        $driver = vehicledetails::where('id', $id)->get();
        return ([
            "status" => 200,
            "driver" => $driver,
        ]);
    }

}

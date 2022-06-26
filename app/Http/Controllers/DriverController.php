<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Driver;
class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return array
     */
    public function index(): array
    {
        $driver = Driver::all();
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
        $driver = new Driver;
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
        return Driver::where('id', $id)->get();
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
        $driver = Driver::find($id);
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $Company = Driver::find($id);
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
        $driver = Driver::where('id', $id)->get();
        return ([
            "status" => 200,
            "driver" => $driver,
        ]);
    }

}

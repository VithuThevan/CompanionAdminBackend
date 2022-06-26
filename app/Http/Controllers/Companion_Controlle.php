<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Companion_Complete;
class Companion_Controlle extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return array|\Illuminate\Http\Response
     */
    public function index(): \Illuminate\Http\Response|array
    {
        $company = Companion_Complete::where('Role','=','Driver')->get();
        return ([
            'status' => 200,
            'company' => $company
        ]);
    }
    public function index1(): \Illuminate\Http\Response|array
    {
        $company = Companion_Complete::where('Role','=','Company')->get();
        return ([
            'status' => 200,
            'company' => $company
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $company = new Companion_Complete();
        $company->NIC = $request->Input('NIC');
        $company->Name = $request->Input('name');
        $company->Address = $request->Input('address');
        $company->Contact_No = $request->Input('contact_No');
        $company->Email = $request->Input('email');
        $company->Role = $request->Input('role');
        $company->Vehicle_type = $request->Input('vehicle_type');
        $company->Vehicle_brand = $request->Input('vehicle_brand');
        $company->Vehicle_color = $request->Input('vehicle_color');
        $company->Vehicle_number = $request->Input('vehicle_number');
        $company->Numberofpassenger = $request->Input('numberofpassenger');
        $company->save();

        return response()->json([
            'status' => 200,
            'message' => 'Student added successfully',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $company = Companion_Complete::find($id);
        $company->Name = $request->Input('name');
        $company->Address = $request->Input('address');
        $company->Contact_No = $request->Input('contact_no');
        $company->Email = $request->Input('email');
        $company->NIC = $request->Input('nic');
        $company->update();

        return response()->json([
            'status' => 200,
            'message' => 'Student added successfully',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $Company = Companion_Complete::find($id);
        $Company->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Student deleted successfully',
        ]);
    }

    /**
     * Search for a name
     *
     * @param int $id
     * @return array
     */
    public function search($id): array
    {
        $driver = Companion_Complete::where('id', $id)->get();
        return ([
            "status" => 200,
            "driver" => $driver,
        ]);
    }
}

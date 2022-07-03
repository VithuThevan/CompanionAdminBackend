<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
class CompanyController1 extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return
     */
    public function index1(): array
    {
        $company = Company::all();
        return ([
            'status' => 200,
            'company' => $company
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $company = new Company;
        $company->Company_Name = $request->Input('name');
        $company->Company_Address = $request->Input('address');
        $company->Company_Number = $request->Input('contact_no');
        $company->Company_Email = $request->Input('email');
        $company->save();

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
        return Company::where('id', $id)->get();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, string $id)
    {
        $company = Company::find($id);
        $company->Company_Name = $request->Input('name');
        $company->Company_Address = $request->Input('address');
        $company->Company_Number = $request->Input('contact_no');
        $company->Company_Email = $request->Input('email');
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
        $Company = Company::find($id);
        $Company->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Student added successfully',
        ]);
    }

    /**
     * Search for a name
     *
     * @param  int  $id
     * @return array
     */
    public function search($id)
    {
        $company = Company::where('id', $id)->get();
        return ([
            "status" => 200,
            "driver" => $company,
        ]);
    }

}

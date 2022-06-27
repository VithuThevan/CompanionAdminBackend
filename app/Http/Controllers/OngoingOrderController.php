<?php

namespace App\Http\Controllers;

use App\Models\OngoingOrder;
use Illuminate\Http\Request;

class OngoingOrderController extends Controller
{
    function insert(Request $request)
    {
        $ongoing = new OngoingOrder;

        $ongoing -> id = $request -> id;
        $ongoing -> name = $request -> name;
        $ongoing -> slocation = $request -> slocation;
        $ongoing -> elocation = $request -> elocation;
        $ongoing -> mobile = $request -> mobile;
        $ongoing -> save();
        return response() -> json(['message' => 'Trip details added to Ongoing OrderTable'], 200);
    }

    public function vieworders(){
        $vieworder = OngoingOrder::all();

        return response()->json([
            'status'=> 200,
            'vorder' => $vieworder,
        ]);
    }

    public function viewordersbyid($id){
        $names = OngoingOrder::find($id);

        return response()->json([
            'status'=> 200,
            'onorder' => $names,
        ]);
    }

    public function delete($id){
        $data = OngoingOrder::find($id);
        $data -> delete();
    }
}

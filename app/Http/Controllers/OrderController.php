<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $order = new Order;
        $order->name = $request->name;
        $order->slocation = $request->slocation;
        $order->elocation = $request->elocation;
        $order->mobile = $request->mobile;
        $order->save();
        return response()->json(['message' => 'Request added succesfullyu'], 200);
    }

    public function vieworders(){
        $vieworder = Order::all();

        return response()->json([
            'status'=> 200,
            'vorder' => $vieworder,
        ]);
    }

    public function viewordersbyid($id){
        $names = Order::find($id);

        return response()->json([
            'status'=> 200,
            'vorder' => $names,
        ]);
    }

    public function delete($id){
        $data = Order::find($id);
        $data -> delete();
    }

    public function search() {
       // $projects = Order::where("name", "=", "zihannn")->get();
        $projects = Order::find(10);

       // dd($projects);
        return response()->json([
            'status'=> 200,
            'vorder' => $projects,
        ]);
    }
}

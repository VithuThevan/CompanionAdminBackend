<?php

namespace App\Http\Controllers;
use App\Models\CompletedOrder;

use Illuminate\Http\Request;

class CompleteOrderController extends Controller
{
    function insert(Request $request)
    {
        $complete = new CompletedOrder;
        $complete -> name = $request -> name;
        $complete -> slocation = $request -> slocation;
        $complete -> elocation = $request -> elocation;
        $complete -> mobile = $request -> mobile;
        $complete -> save();

        return response() -> json(['message' => 'Trip details added to Complete OrderTable'], 200);
    }

    public function vieworders(){
        $vieworder = CompletedOrder::all();

        return response()->json([
            'status'=> 200,
            'vorder' => $vieworder,
        ]);
    }

    public function viewordersbyid($id){
        $names = CompletedOrder::find($id);

        return response()->json([
            'status'=> 200,
            'onorder' => $names,
        ]);
    }

    public function index(){
        $vithu = CompletedOrder::all();
        return response()->json([
            'status'=> 200,
            'company' => $vithu,
        ]);
    }

    public function FileUpload(Request $request){
        $request->file->store('Uploads');
        $fileupload = new CompletedOrder;
        $extension = $request->file->getClientOriginalExtension();
        $filename = time().".".$extension;
        // $fileupload->File =$request->file->hashName();
        $request->file->move('uploads/product/',$filename);
        $fileupload->File = 'uploads/product/'.$filename;
        $results = $fileupload->save();
        if($results){
            return ["File Uploaded to database"];
        }else{
            return "File Not Uploaded to database";
        }
    }
}

<?php

namespace App\Http\Controllers;
use App\Models\CompletedOrder;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\testmail;
use App\Mail\testmail1;


class CompleteOrderController extends Controller
{
    function insert(Request $request)
    {
        $complete = new CompletedOrder;
        $complete->name = $request->name;
        $complete->slocation = $request->slocation;
        $complete->elocation = $request->elocation;
        $complete->mobile = $request->mobile;
        $complete->save();

        return response()->json(['message' => 'Trip details added to Complete OrderTable'], 200);
    }

    public function vieworders()
    {
        $vieworder = CompletedOrder::all();

        return response()->json([
            'status' => 200,
            'vorder' => $vieworder,
        ]);
    }

    public function viewordersbyid($id)
    {
        $names = CompletedOrder::find($id);

        return response()->json([
            'status' => 200,
            'onorder' => $names,
        ]);
    }

    public function index()
    {
        $vithu = CompletedOrder::where('Approved', '=', NULL)->get();
        return response()->json([
            'status' => 200,
            'company' => $vithu,
        ]);
    }

    public function index1()
    {
        $vithu = CompletedOrder::where('Approved', '=', 'yes')->get();
        return response()->json([
            'status' => 200,
            'company' => $vithu,
        ]);
    }
    public function index2()
    {
        $vithu = CompletedOrder::where('Approved', '=', 'no')->get();
        return response()->json([
            'status' => 200,
            'company' => $vithu,
        ]);
    }

    public function FileUpload(Request $request)
    {
        $request->file->store('Uploads');
        $fileupload = new CompletedOrder;
        $extension = $request->file->getClientOriginalExtension();
        $filename = time() . "." . $extension;
        $request->file->move('uploads/product/', $filename);
        $fileupload->File = 'uploads/product/' . $filename;
        $fileupload->Email = 'thevendranvithursan@gmail.com';
        $results = $fileupload->save();
        if ($results) {
            return ["File Uploaded to database"];
        }
        else {
            return "File Not Uploaded to database";
        }
    }

    public function update(Request $request, string $id)
    {
        $driver = CompletedOrder::find($id);
        $driver->Approved = 'No';
        $driver->File = NULL;
        $driver->save();
        $sendemail = $driver->Email;
        $this->sendEmail($sendemail);
        return response()->json([
            'status' => 200,
            'message' => 'Student added successfully',
        ]);
    }

    public function sendEmail($sendemail)
    {
        $details = [
            'title' => 'Mail from Surfside Media',
            'body' => 'This is for testing mail using gmail'
        ];

        Mail::to($sendemail)->send(new testmail($details));
        return "Email Sent";
    }

    public function update1(Request $request, string $id)
    {
        $driver = CompletedOrder::find($id);
        $driver->Approved = 'Yes';
        $driver->save();
        $sendemail = $driver->Email;
        $sendname = $driver->name;
        $this->sendEmail1($sendemail, $sendname);
        return response()->json([
            'status' => 200,
            'message' => 'Student added successfully',
        ]);
    }

    public function sendEmail1($sendemail, $sendname)
    {
        $details = [
            'title' => 'Mail from Surfside Media',
            'body' => 'This is for testing mail using gmail',
            'name' => $sendname
        ];

        Mail::to($sendemail)->send(new testmail1($details));
        return "Email Sent";
    }

}

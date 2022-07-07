<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\Validator;

class Logincontroller extends Controller
{
    public function login(Request $request): \Illuminate\Http\JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|max:191',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'validation_errors' => $validator->messages(),
         ]);
        }
        else {
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json([
                'status' => 401,
                'message' => 'Invalid Credentials',
            ]);
        }
        else {
            $token = $user->createToken('myapptoken')->plainTextToken;
            return response()->json([
                'status' => 200,
                'username' => $user->name,
                'token' => $token,
                'message' => 'Logged In Successfully',
            ]);

        }

    }
}
}

// public function login(Request $request)
// {
//     $fields = $request->validate([
//         'email' => 'required|email',
//         'password' => 'required|string'
//     ]);

//     // Check email
//     $user = User::where('email', $fields['email'])->first();

//     // Check password
//     // if (!$user || !Hash::check($fields['password'], $user->password))
//     if (!$user) {
//         return response([
//             'message' => 'Bad credentials'
//         ], 401);
//     }

//     $token = $user->createToken('myapptoken')->plainTextToken;

//     return response()->json([
//         'status' => 200,
//         'username' => $user->name,
//         'token' => $token,
//         'message' => 'Logged In Successfully',
//     ]);
// }

//}

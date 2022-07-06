<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;


use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function employee(Request $request)
    {

        try {

            $validator = Validator::make($request->all(), [
                'empid' => 'required|string|max:255'

            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors());
            }
            $user = User::select('id','name','designation','email','phone_number','address_line1','address_line2')->where('id', $request->empid)->firstOrFail();


            return response()->json([
                "code" => 200,
                "status" => true,
                // "message" => 'Registered Sucessfully',
                "message" => "Employee Details!",
                "data" => $user,
            //    "data" => $request->id,

            ], 200);
        } catch (\Throwable $th) {
            echo $request->empid . $request->id;
            return response()->json([
                'code' => 200,
                'status' => false,
                'message' => $th->getMessage()
                //  'message' => "Try After Sometime"
            ], 500);
        }
    }





    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()
            ->json(['data' => $user, 'access_token' => $token, 'token_type' => 'Bearer',]);
    }

    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()
                ->json(['message' => 'Unauthorized'], 401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()
            ->json(['message' => 'Hi ' . $user->name . ', welcome to home', 'access_token' => $token, 'token_type' => 'Bearer',]);
    }

    // method for user logout and delete token
    public function logout()
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'You have successfully logged out and the token was successfully deleted'
        ];
    }
}

<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AjaxEmployeeController extends Controller
{
    //
    public function myform()
    {
    	return view('myform');
    }

    public function myformPost(Request $request)
    {
//        dd($request);

    	$validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
        ]);


           $user = User::create([
            'name' => $request->first_name,
            'email' => $request->email,
            'designation' => $request->last_name,
            'address_line1' => $request->last_name,
            'password' => Hash::make('1234')
        ]);

        if ($validator->passes()) {
            return response()->json(['success'=>'Added new records.']);
        }

         return response()->json(['error'=>$validator->errors()->all()]);
    }


    public function index()
    {
        return view('ajax-employee-form');
    }

    public function store(Request $request)
    {



          $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        // $user = User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //  //   'password' => Hash::make('1234')
        // ]);

        return redirect('form')->with('status', 'Ajax Form Data Has Been validated and store into database');

    }
}

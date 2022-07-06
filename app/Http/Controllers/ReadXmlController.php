<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ReadXmlController extends Controller
{
    public function index(Request $request)
    {



         if($request->isMethod("POST")){


            $validated = $request->validate([
                'file' => 'required',
            ]);

            // $prescription_id =  CustomerPrescription::insertGetId([
            //     'customer_id' => auth()->user()->id,
            //     'upload_date' => Carbon::now(),
            //     'status' => 1,
            //  ]);

            $data = array();

            if ($request->file('file')) {

                // $data = CustomerPrescription::find($prescription_id);
                $file = $request->file('file');
           //   @unlink(public_path('upload/customer_prescription/' . $data->file_path)); // to remove old image
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('upload'), $filename);
                $data['file_path'] = $filename;
                //dd($data);
            }

            // $notification = array(
            //     'message' => 'Prescription Uploaded Successfully',
            //     'alert-type' => 'success'
            // );



        // $req->validate([
        //     'file' => 'required|mimes:pdf,xlx,csv|max:2048',
        // ]);

        // $fileName = time().'.'.$req->file->extension();

        // $req->file->move(public_path('uploads'), $fileName);

        // dd($fileName);

        // return back()
        //     ->with('success','You have successfully upload file.')
        //     ->with('file',$fileName);

            $xmlDataString = file_get_contents(public_path('upload/'. $data['file_path']));
            $xmlObject = simplexml_load_string($xmlDataString);

            $json = json_encode($xmlObject);
            $phpDataArray = json_decode($json, true);

            // echo "<pre>";
            // print_r($phpDataArray);

            if(count($phpDataArray['employee']) > 0){

                $dataArray = array();

                foreach($phpDataArray['employee'] as $index => $data){

                    $dataArray[] = [
                        "name" => $data['name'],
                        "email" => $data['email'],
                        "designation" => $data['designation'],
                        "address_line1" => $data['address_line1'],
                        "password" => Hash::make('1234')
                    ];
                }

                User::insert($dataArray);

                return back()->with('success','Data saved successfully!');
            }
        }

        return view("xml-data");
    }
}

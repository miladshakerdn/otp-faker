<?php

namespace App\Http\Controllers;
use App\Models\Otp;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
class OtpController extends Controller
{
    public function __construct(Request $request)
    {
        // merg the request with the route parameters
        $request->merge($request->route()[2]);
    }
    public function index(){
        $products = Otp::all();
        return response()->json($products);
    }
    // show otp by phone
    public function show(Request $request){
        $this->validate($request,[
            'phone' => 'required|regex:/^09\d{9}$/|min:11|max:11',
        ]);
        $product = Otp::where('phone', $request->phone)->first();
        return response()->json($product, 201);
    }

    // send otp by phone
    public function send(Request $request){
        $this->validate($request,[
            'phone' => 'required|regex:/^09\d{9}$/|min:11|max:11',
        ]);
        // check if phone number already exists and delete it
        $product = Otp::where('phone', $request->phone)->first();
        if($product){
            $product->delete();
        }
        $product = new Otp();
        // rand to generate random number steritng from 0000 to 9999
        $product->otp = str(rand(0000,9999));
        $product->phone = $request->phone;

        $product->save();
        // send otp to phone
        // set header status code to 201
        return response()->json($product, 201);
        // return response()->json("Otp sucessfully sent!");

    }


    public function verify(Request $request){
        // check if otp is correct
        $this->validate($request,[
            'phone' => 'required|regex:/^09\d{9}$/|min:11|max:11',
            'otp' => 'required|digits:4'
        ]);
        $product = Otp::where('phone',$request->phone)->first();
        if($product && $product->otp == $request->otp){
            // return true as boolean
            return response()->json(true, 201);        }
        // return response with error code 400
        return response()->json(false, 400);
    }

    public function delete(Request $request){
        $this->validate($request,[
            'phone' => 'required|regex:/^09\d{9}$/|min:11|max:11',
        ]);
        // delete otp by phone if exists
        $product = Otp::where('phone', $request->phone)->first();
        if($product){
            $product->delete();
            return response()->json(true, 201);
        }
        return response()->json(false, 400);

    }
    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\RechargeRequest;

class CustomerController extends Controller
{
    public function dashboard(){
        return view('customer.dashboard');
    }

    public function tasks(){
        return view('customer.tasks');
    }

    public function revenueRecord(){
        return view('customer.revenueRecord');
    }

    public function myAccount(){
        return view('customer.myAccount');
    }

    public function recharge(){
        return view('customer.recharge');
    }

    public function rechargeSubmit(Request $request){
        $validator = Validator::make($request->all(), [
            'amount' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,heif',
        ]);

        if ($validator->fails()) {
            return redirect('/recharge')->withErrors($validator)->withInput();
        }

        $image = $request->file('image');
        $imageName = Str::random(32) . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/recharge'), $imageName);

        $recharge = RechargeRequest::create([
            'user_id' => auth()->user()->id,
            'amount' => $request->amount,
            'recharge_proof' => $imageName,
            'created_at' => now(),
        ]);
        if($recharge){
            return redirect('/recharge')->with('success', 'Recharge request submitted successfully!');   
        }
    }
}

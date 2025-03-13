<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\RechargeRequest;
use App\Models\UserBankDetails;
use App\Models\Withdraw;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function bankDetails(){
        $bankDetails = UserBankDetails::where('user_id', Auth::user()->id)->first();
        return view('customer.bankDetails')->with('bankDetails', $bankDetails);
    }

    public function bankDetailsSubmit(Request $request){
        $validator = Validator::make($request->all(), [
            'bank_name' => 'required|string',
            'account_number' => 'required|numeric',
            'account_holder_name' => 'required|string',
            'branch_name' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $bank = UserBankDetails::create([
            'user_id' => Auth::user()->id,
            'bank_name' => $request->bank_name,
            'account_number' => $request->account_number,
            'account_holder_name' => $request->account_holder_name,
            'bank_branch' => $request->branch_name,
            'created_at' => now(),
        ]);

        if($bank){
            return redirect()->back()->with('success', 'Bank details added successfully!');   
        }
        else{
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function withdrawal(){
        $bankDetails = UserBankDetails::where('user_id', Auth::user()->id)->first();
        return view('customer.withdrawal')->with('bankDetails', $bankDetails);
    }

    public function withdrawalSubmit(Request $request){
        $validator = Validator::make($request->all(), [
            'amount' => 'required|numeric|min:1',
            'password' => 'required',
            'digit-2' => 'required|numeric|digits:1',
            'digit-3' => 'required|numeric|digits:1',
            'digit-4' => 'required|numeric|digits:1',
            'digit-5' => 'required|numeric|digits:1',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        if (Auth::user()->total_amount < $request->amount) {
            return redirect()->back()->with('error', 'Insufficient balance');
        }
    
        $pin = $request->input('digit-2') . $request->input('digit-3') . $request->input('digit-4') . $request->input('digit-5');
    
        if (Hash::check($request->password, Auth::user()->password) && Hash::check($pin, Auth::user()->transaction_password)) {
            $withdraw = Withdraw::create([
                'user_id' => Auth::user()->id,
                'amount' => $request->amount,
                'created_at' => now(),
            ]);
    
            if ($withdraw) {
                return redirect()->back()->with('success', 'Withdrawal request submitted successfully!');
            }
            else{
                return redirect()->back()->with('error', 'Something went wrong');
            }
        } else {
            return redirect()->back()->with('error', 'Invalid password or transaction PIN');
        }
    }    
}

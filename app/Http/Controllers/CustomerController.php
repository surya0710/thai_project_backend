<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\RechargeRequest;
use App\Models\UserBankDetails;
use App\Models\Withdraw;
use App\Models\UserAddress;
use App\Models\User;
use App\Models\Products;
use App\Models\TasksHistory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function dashboard(){
        $userData = User::find(Auth::guard('customer')->user()->id);
        return view('customer.dashboard', compact('userData'));
    }

    public function tasks()
    {
        $userData = User::find(Auth::guard('customer')->user()->id);
        $tasksPrice = generateTaskPrices($userData->badge);
        $userTasks = TasksHistory::where('user_id', $userData->id)->get();
        $tasksCompleted = count($userTasks);
        $tasksToFetch = max(0, 29 - $tasksCompleted); // Ensure it's not negative

        // Get completed task IDs to avoid duplicates
        $completedTaskIds = $userTasks->pluck('product_id')->toArray();

        // Fetch completed tasks
        $completedTasks = Products::whereIn('id', $completedTaskIds)
            ->with('taskStatus')
            ->get();

        // Define task price ranges for selection
        $taskPriceRanges = array_map(fn($price) => [$price - 5, $price - 2], $tasksPrice['regular_tasks']);

        // Fetch new tasks, ensuring no duplicates with completed tasks
        $newTasks = Products::where(function ($query) use ($taskPriceRanges) {
            foreach ($taskPriceRanges as $range) {
                $query->orWhereBetween('price', $range);
            }
        })
        ->whereNotNull('id')
        ->whereNotIn('id', $completedTaskIds) // Exclude completed tasks
        ->with('taskStatus')
        ->distinct()
        ->limit($tasksToFetch)
        ->get();

        // Merge completed tasks with newly fetched tasks
        $tasks = $completedTasks->merge($newTasks);

        // Fetch the lucky task ensuring uniqueness
        $luckyTask = Products::whereBetween('price', [$tasksPrice['lucky_task'] - 2, $tasksPrice['lucky_task']])
            ->whereNotIn('id', $tasks->pluck('id')->toArray()) // Exclude already selected tasks
            ->with('taskStatus')
            ->first();

        // Insert lucky task at position 26
        if ($luckyTask) {
            $tasks->splice(26, 0, [$luckyTask]);
        } else {
            // Fetch alternative lucky task if not found
            $alternativeLuckyTask = Products::whereNotIn('id', $tasks->pluck('id')->toArray())
                ->orderByRaw('RAND()')
                ->with('taskStatus')
                ->first();
            
            if ($alternativeLuckyTask) {
                $tasks->splice(26, 0, [$alternativeLuckyTask]);
            }
        }

        // Ensure exactly 30 tasks
        if ($tasks->count() < 30) {
            $remaining = 30 - $tasks->count();
            $extraTasks = Products::whereNotIn('id', $tasks->pluck('id')->toArray())
                ->with('taskStatus')
                ->limit($remaining)
                ->get();
            $tasks = $tasks->merge($extraTasks);
        }

        return view('customer.tasks', compact('userData', 'tasks'));
    }

    public function revenueRecord(){
        $userData = User::find(Auth::guard('customer')->user()->id);
        return view('customer.revenueRecord', compact('userData'));
    }

    public function myAccount(){
        $userData = User::find(Auth::guard('customer')->user()->id);
        return view('customer.myAccount', compact('userData'));
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

        $userData = User::find(Auth::guard('customer')->user()->id);

        if($userData->is_blocked == 1){
            return redirect('/recharge')->with('error', 'You are not allowed to do any transactions');
        }

        $image = $request->file('image');
        $imageName = Str::random(32) . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/recharge'), $imageName);

        $recharge = RechargeRequest::create([
            'user_id' => Auth::guard('customer')->user()->id,
            'amount' => $request->amount,
            'recharge_proof' => $imageName,
            'created_at' => now(),
        ]);
        if($recharge){
            return redirect('/recharge')->with('success', 'Recharge request submitted successfully!');   
        }
    }

    public function bankDetails(){
        $bankDetails = UserBankDetails::where('user_id', Auth::guard('customer')->user()->id)->first();
        return view('customer.bankDetails')->with('bankDetails', $bankDetails);
    }

    public function bankDetailsSubmit(Request $request){
        $validator = Validator::make($request->all(), [
            'bank_name' => 'required|string',
            'account_number' => 'required|numeric',
            'account_holder_name' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $bank = UserBankDetails::create([
            'user_id' => Auth::guard('customer')->user()->id,
            'bank_name' => $request->bank_name,
            'account_number' => $request->account_number,
            'account_holder_name' => $request->account_holder_name,
            'bank_branch' => $request->branch_name ?? '',
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
        $userData = User::find(Auth::guard('customer')->user()->id);
        $bankDetails = UserBankDetails::where('user_id', Auth::guard('customer')->user()->id)->first();
        return view('customer.withdrawal', compact('userData'))->with('bankDetails', $bankDetails);
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

        $userData = User::find(Auth::guard('customer')->user()->id);

        if($userData->is_blocked == 1){
            return redirect()->back()->with('error', 'You are not allowed to do any transactions');
        }
        
        $totalAmount = $userData->total_amount;
        $freezedAmount = $userData->frozen_amount;

        if (($totalAmount - $freezedAmount) < $request->amount) {
            return redirect()->back()->with('error', 'Insufficient balance');
        }
    
        $pin = $request->input('digit-2') . $request->input('digit-3') . $request->input('digit-4') . $request->input('digit-5');
    
        if (Hash::check($request->password, $userData->password) && Hash::check($pin, $userData->transaction_password)) {
            $withdraw = Withdraw::create([
                'user_id' => $userData->id,
                'amount' => $request->amount,
                'created_at' => now(),
            ]);

            $user = User::find($userData->id);
            $user->frozen_amount = $request->amount;
            $user->update();
    
            if ($withdraw) {
                return redirect()->back()->with('success', 'Withdrawal request submitted successfully!');
            }
            else{
                return redirect()->back()->with('error', 'Something went wrong');
            }
        } else {
            if (!Hash::check($request->password, Auth::guard('customer')->user()->password)) {
                return redirect()->back()->with('error', 'Invalid password');
            } else {
                return redirect()->back()->with('error', 'Invalid transaction PIN');
            }
        }
    }    

    public function rechargeWithdrawalHistory(){
        $rechargeRequests = RechargeRequest::where('user_id', Auth::guard('customer')->user()->id)->get();
        $withdrawals = Withdraw::where('user_id', Auth::guard('customer')->user()->id)->get();
        return view('customer.rechargeWithdrawalHistory', compact('rechargeRequests', 'withdrawals'));
    }

    public function myAddress(){
        $address = UserAddress::where('user_id', Auth::guard('customer')->user()->id)->get();
        return view('customer.myAddress')->with(['addresses' => $address]);
    }

    public function myAddressAdd(){
        $userData = User::find(Auth::guard('customer')->user()->id);
        $address = UserAddress::where('user_id', Auth::guard('customer')->user()->id)->first();
        return view('customer.myAddressAdd', compact('userData'))->with(['address' => $address]);
    }

    public function myAddressStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'contact_name' => 'required|string',
            'contact_number' => 'required|numeric',
            'location' => 'required|string',
            'detailed_address' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Get user ID
        $userId = Auth::guard('customer')->user()->id;

        // Retrieve or create address
        $address = UserAddress::updateOrCreate(
            ['user_id' => $userId], // Search condition
            [ // Values to update or create
                'contact_name' => $request->contact_name,
                'contact_number' => $request->contact_number,
                'location' => $request->location,
                'detailed_address' => $request->detailed_address,
            ]
        );

        return $address
            ? redirect('/my-address')->with('success', 'Address saved successfully!')
            : redirect()->back()->with('error', 'Something went wrong');
    }

    public function profile(){
        $user = Auth::guard('customer')->user();
        return view('customer.profile', compact('user'));
    }

    public function profileUpdate(Request $request){
        $FormData = $request->all();
        $user = User::find(Auth::guard('customer')->user()->id);
        if($FormData['username'] != $user->username){
            $user->username = $FormData['username'];
        }
        if($FormData['telegram_id'] != $user->telegram_id){
            $user->telegram_id = $FormData['telegram_id'];
        }
        if($FormData['email'] != $user->email){
            $user->email = $FormData['email'];
        }
        $user->save();
        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

    public function changePassword(){
        return view('customer.changePassword');
    }

    public function changePasswordUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required|string',
            'password' => 'required|string',
            'confirm_password' => 'required|string|same:password',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if (!Hash::check($request->old_password, Auth::guard('customer')->user()->password)) {
            return redirect()->back()->withErrors(['old_password' => 'The old password is incorrect.'])->withInput();
        }

        if($request->password == $request->old_password){
            return redirect()->back()->with(['error' => 'New password cannot be the same as the old password.'])->withInput();
        }

        $user = Auth::guard('customer')->user();
        if($user->update(['password' => Hash::make($request->password)])){
            return redirect()->back()->with('success', 'Password changed successfully!');
        }
        else{
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function transactionPassword(){
        return view('customer.transactionPassword');
    }

    public function transactionPasswordUpdate(Request $request){
        $FormData = $request->all();
        $pin = $FormData['digit-2'] . $FormData['digit-3'] . $FormData['digit-4'] . $FormData['digit-5'];
        if (!Hash::check($pin, Auth::guard('customer')->user()->transaction_password)) {
            $user = User::find(Auth::guard('customer')->user()->id);
            $user->transaction_password = Hash::make($pin);
            $user->save();
            return redirect()->back()->with('success', 'Transaction PIN updated successfully!');
        }
        else{
            return redirect()->back()->with('error', 'PIN cannot be the same as the old PIN.');
        }
    }

    public function logout(){
        Auth::guard('customer')->logout();
        return redirect('/');
    }
}

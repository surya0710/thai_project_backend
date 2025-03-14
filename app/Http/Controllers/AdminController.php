<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\RechargeRequest;
use App\Models\Withdraw;

class AdminController extends Controller
{
    
    public function index()
    {
        return view('admin.index');
    }

    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            redirect('admin.index')->with(['errors' => $validator->errors()]);
        }

        $User = User::where('email', $request->email)->whereIn('user_type', ['Boss', 'Manager', 'Worker'])->first();

        if($User == null){
            return redirect('admin/')->with(['error' => 'Invalid credentials']);
        };

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->route('dashboard');
        }else{
            return redirect('admin/')->with(['error' => 'Invalid credentials']);
        }
    }

    public function dashboard(){
        $withdrawList = Withdraw::where('status', 0)->with('user', 'handledBy', 'bankDetails')->orderBy('status', 'ASC')->orderBy('created_at', 'ASC')->limit(10)->get();
        $rechargeList = RechargeRequest::with('user:id,username,phone,name,invitation_code', 'approver:id,username,name')
        ->where('status', 0)
        ->orderBy('status', 'ASC')
        ->orderBy('created_at', 'ASC')
        ->limit(10)
        ->get();
        return view('admin.dashboard', compact('withdrawList', 'rechargeList'));
    }

    public function logout(){
        if(auth::user()->role == 'admin'){
            Auth::logout();
            return redirect('admin/');
        }
        else{
            Auth::logout();
            return redirect('/');
        }
    }

}

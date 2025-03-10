<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function login(Request $request){

        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $User = User::where('username', $request->username)->where('user_type', 'Customer')->first();

        if($User == null){
            return redirect('/')->with(['error' => 'User does not exist']);
        };

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            if (Auth::user()->role === 'customer') {
                return redirect()->route('customer.dashboard');
            }
            else{
                return redirect('/')->with('error', 'Invalid username or password');
            }
        } else {
            return redirect('/')->with('error', 'Invalid username or password');
        }
    }

    public function adminList(){
        $users = User::where('user_type', '!=','Customer')->get();
        return view('admin.adminList')->with(['users' => $users, 'active' => 'adminList']);
    }
    public function adminAdd(){
        $users = User::where('user_type', '!=','Customer')->get();
        return view('admin.adminAdd')->with(['users' => $users, 'active' => 'adminAdd']);
    }

    public function userList(){
        $users = User::where('user_type', 'Customer')->get();
        return view('admin.userList')->with(['users' => $users, 'active' => 'userList']);
    }
    public function userAdd(){
        $users = User::where('user_type', 'Customer')->get();
        return view('admin.userAdd')->with(['users' => $users, 'active' => 'userAdd']);
    }
    public function lazadaList(){
        $users = User::where('user_type', 'Customer')->get();
        return view('admin.lazadaList')->with(['users' => $users, 'active' => 'lazadaList']);
    }

    public function lazadaAdd(){
        $users = User::where('user_type', 'Customer')->get();
        return view('admin.lazadaAdd')->with(['users' => $users, 'active' => 'lazadaAdd']);
    }
    public function rechargeList(){
        $users = User::where('user_type', 'Customer')->get();
        return view('admin.rechargeList')->with(['users' => $users, 'active' => 'rechargeList']);
    }
    public function withdrawalList(){
        $users = User::where('user_type', 'Customer')->get();
        return view('admin.withdrawalList')->with(['users' => $users, 'active' => 'withdrawalList']);
    }
    public function Profile(){
        $users = User::where('user_type', 'Customer')->get();
        return view('admin.Profile')->with(['users' => $users, 'active' => 'Profile']);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}

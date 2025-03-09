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
            return redirect()->route('dashboard');
        } else {
            return redirect('/')->with('error', 'Invalid username or password');
        }
    }

    public function adminList(){
        $users = User::where('user_type', '!=','Customer')->get();
        return view('admin.adminList')->with(['users' => $users, 'active' => 'adminList']);
    }

    public function userList(){
        $users = User::where('user_type', 'Customer')->get();
        return view('admin.userList')->with(['users' => $users, 'active' => 'userList']);
    }
}

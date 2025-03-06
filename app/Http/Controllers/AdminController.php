<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

        if(auth()->attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->route('dashboard');
        }else{
            return redirect('admin/')->with(['error' => 'Invalid credentials']);
        }
    }

    public function dashboard(){
        return view('admin.dashboard');
    }

    public function logout(){
        auth()->logout();
        return redirect('admin/');
    }

}

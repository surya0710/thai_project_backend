<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderManagermentController extends Controller
{
    public function automaticOrder(){
        return view('customer.automaticOrder');
    }
}

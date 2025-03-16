<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Facades\Auth;

class OrderManagermentController extends Controller
{
    public function automaticOrder()
    {
        $userId = Auth::guard('customer')->id(); // Get authenticated user ID
        $userBadge = Auth::guard('customer')->user()->badge;

        // Calculate average product price
        $userId = auth()->id();
    
        $minEarnings = 13;
        $maxEarnings = 15;

        $tasks = getTasksForUser($userId, $minEarnings, $maxEarnings);

        return view('customer.automaticOrder', compact('tasks'));
    }
}

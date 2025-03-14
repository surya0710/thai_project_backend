<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Facades\Auth;

class OrderManagermentController extends Controller
{
    public function automaticOrder()
    {
        $userId = Auth::id(); // Get authenticated user ID
        $userBadge = Auth::user()->badge;

        // Calculate average product price
        $averageProductPrice = calculateAverageProductPrice($userBadge);

        // Fetch a product that the user has NOT completed
        $tasks = Products::whereDoesntHave('checkTaskCompletion', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })
        ->whereBetween('price', [$averageProductPrice - 2, $averageProductPrice + 2]) // Get products around the average price
        ->first(); // Fetch only one task

        return view('customer.automaticOrder', compact('tasks'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class OrderManagermentController extends Controller
{
    public function automaticOrder()
    {
        $userData = User::find(Auth::guard('customer')->user()->id);
        $tasksPrice = generateTaskPrices($userData->badge);
        
        $taskPriceRanges = array_map(fn($price) => [$price - 5, $price - 2 ], $tasksPrice['regular_tasks']);
        $tasks = Products::where(function ($query) use ($taskPriceRanges) {
            foreach ($taskPriceRanges as $range) {
                $query->orWhereBetween('price', $range);
            }
        })->whereNotNull('id')
        ->with('taskStatus')
        ->distinct()
        ->limit(1)
        ->get();
        return view('customer.automaticOrder', compact('userData', 'tasks'));
    }
}

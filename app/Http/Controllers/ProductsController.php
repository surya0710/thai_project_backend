<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class ProductsController extends Controller
{
    public function search(Request $request){
        $price = $request->price;
        $products = Products::whereBetween('price', [$price-5, $price+2])
        ->where('is_deleted', 0)->get();
        return response()->json([
            'status' => 'success',
            'products' => $products,
            'count' => count($products)
        ]);
    }
}

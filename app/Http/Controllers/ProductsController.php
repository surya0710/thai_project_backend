<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class ProductsController extends Controller
{
    public function search(Request $request){
        $name = $request->name;
        $products = Products::where('name', 'LIKE', '%'.$name.'%')->where('is_deleted', 0)->get();
        return response()->json([
            'status' => 'success',
            'products' => $products,
            'count' => count($products)
        ]);
    }
}

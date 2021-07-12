<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class ProductController extends Controller
{
    public function index()
    {
        // dd($requset->all());die();
        $product = Product::all();
        return response()->json([
            'success' => 1,
            'message' => 'Get Product Berhasil',
            'product' => $product
        ]);
    }
}

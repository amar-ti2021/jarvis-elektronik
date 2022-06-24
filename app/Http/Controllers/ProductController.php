<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $data = [
            "title" => "Product Lists",
            "active" => "products",
            "products" => Product::with('vendor')->get(),
        ];
        return view('products.index', $data);
    }
}

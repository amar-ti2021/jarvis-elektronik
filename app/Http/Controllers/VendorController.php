<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Vendor Lists',
            'active' => 'vendors',
            'vendors' => Vendor::with('product')->get()
        ];
        return view('vendors.index', $data);
    }
}

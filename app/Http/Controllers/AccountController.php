<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'User Accounts',
            'active' => 'accounts',
            'accounts' => User::with('employee')->get()
        ];

        return view('accounts.index', $data);
    }
}

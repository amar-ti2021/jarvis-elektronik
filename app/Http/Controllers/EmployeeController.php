<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $data = [
            'title' => "Employee Lists",
            'active' => 'employees',
            'employees' => Employee::with(['user', 'role'])->get()
        ];

        return view('employee.index', $data);
    }
}

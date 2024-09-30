<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $customers = User::with('reservations')->paginate(10);
        return view('admin.dashboard', compact('customers'));
    }
}

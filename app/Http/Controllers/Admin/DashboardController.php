<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function general()
    {
        return view('admin.dashboard.general');
    }
    public function membership()
    {
        return view('admin.dashboard.membership');
    }
}

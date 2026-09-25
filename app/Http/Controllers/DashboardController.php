<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboards.index');
    }

    public function userIndex()
    {
        return view('user.dashboard.index');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LockerController extends Controller
{
    public function index()
    {
        return view('lockers.index');
    }

    public function userIndex()
    {
        return view('user.lockers.index');
    }
}

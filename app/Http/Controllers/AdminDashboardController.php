<?php

namespace App\Http\Controllers;

class AdminDashboardController extends Controller
{
    //
    public function index()
    {
        return view('backend.admin_home');
    }
}

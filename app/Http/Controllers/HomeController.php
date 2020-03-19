<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    //

    public function index()
    {
        return view('frontend.homepage');
    }

    public function login()
    {
        return view('frontend.login');
    }
}

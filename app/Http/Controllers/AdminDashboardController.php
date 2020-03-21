<?php

namespace App\Http\Controllers;

class AdminDashboardController extends BaseController
{
    //
    public function index()
    {
        $this->setPageTitle('TixGo Admin Dashboard', 'Cinema & Movies');
        return view('backend.admin_home');
    }
}

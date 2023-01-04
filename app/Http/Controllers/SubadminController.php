<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubadminController extends Controller
{
    public function dashboard()
    {   
        return view('subadmin.pages.dashboard');
    }
    public function subadminlogin()
    {   
        return view('subadmin.login');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.pages.index');
    }  
    public function shop()
    {
        return view('frontend.pages.shop');
    }  
}

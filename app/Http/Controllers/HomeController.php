<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('subadmin.pages.dashboard');
    }
    public function managerDashboard()
    {
        return view('manager_dashboard');
    }

    public function superAdminDashboard()
    {
        return view('admin.pages.dashboard');
    }
    public function logout()
    {
        Session::flush();
        
        Auth::logout();

        return redirect('/adminlogin');
    }

  


}

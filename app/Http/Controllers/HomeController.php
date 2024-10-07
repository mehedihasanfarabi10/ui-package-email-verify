<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    //  Checking if loggedIn then only return view page=>auth
    public function __construct()
    {
        $this->middleware(middleware: 'auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function deposit()  {
        return view('deposit');
    }

    public function resend()  {
        return "Resended email";
    }
}

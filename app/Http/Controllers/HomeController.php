<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

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

    public function detailss($id)  {
        
        
        //Crypt used to encryption


        $id = Crypt::decryptString($id);

        echo "Id is => ".$id;

        //DB query data
        // $user = DB::table('users')->where('id', $id)->first();


        
    }
}

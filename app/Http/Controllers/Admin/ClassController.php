<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ClassController extends Controller
{
       //  Checking if loggedIn then only return view page=>auth
       public function __construct()
       {
           $this->middleware(middleware: 'auth');
       }

       function index() {

        // Fetch all data from 'classes' table
            $classData = DB::table('classes')->get();

            //compact diye data send kora hoy and exact same name rakhte hobe
            //array data send
            return view('admin.class.index',compact('classData'));
       }





}

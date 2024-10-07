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
       function create() {

        
            return view('admin.class.create');
       }
       
       function store(Request $request) {

        //classes table e unique hobe sejnne unique:classes

        $request->validate([
            'class_name' => 'required|unique:classes',
            
        ]);

        $data = array(
            [
                'class_name' => $request->class_name,	
            ]
            );

            DB::table('classes')->insert($data);
        
            return redirect()->back()->with('success','Class created successfully');
       }

       public function delete($id) {

            DB::table('classes')->where('id',$id)->delete();
        
            return redirect()->back()->with('success','Class deleted successfully');
       }

       public function edit($id) {
        // Fetch the class by ID
        $class = DB::table('classes')->where('id', $id)->first();
        
        // Return the edit view with the class data
        return view('admin.class.edit', compact('class'));
    }
    
       public function update(Request $request,$id) {

        $request->validate([
            'class_name' => 'required',
            
        ]);

            // Update the class in the database
    DB::table('classes')->where('id', $id)->update([
        'class_name' => $request->class_name,
        'updated_at' => now(),
    ]);
            return redirect()->back()->with('success','Class updated successfully');
       }





}

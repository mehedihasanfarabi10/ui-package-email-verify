<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        //Data Fetch
        $studenty = DB::table('students')->orderBy('roll','ASC')->get();


        //Data Send
        return view('admin.student.index',compact('studenty'));



    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        //Class data ene je class er under e  student create korbo sei class er id nibo

        $classess = DB::table('classes')->get();


        return view('admin.student.create',compact('classess'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        //classes table e unique hobe sejnne unique:classes

        $request->validate([
            'class_id' => 'required',
            'name' => 'required',
            'roll' => 'required',
            'email' => 'required',
            'phone' => 'required',
            
        ]);

        $data = array(
            [
                'class_id' => $request->class_id,	
                'name' => $request->name,	
                'roll' => $request->roll,	
                'email' => $request->email,	
                'phone' => $request->phone,	
            ]
            );

            DB::table('students')->insert($data);
        
            return redirect()->back()->with('success','Student created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        

        $student = DB::table('students')->where('id',$id)->first();
        return response()->json($student);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $classess = DB::table('classes')->get();
        $student = DB::table('students')->where('id',$id)->first();

        return view('admin.student.edit',compact('classess','student'));
       

        




    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        
        $request->validate([
            'class_id' => 'required',
            'name' => 'required',
            'roll' => 'required',
            'email' => 'required',
            'phone' => 'required|max:50',
            
        ]);

        // Create the data array without the extra array wrapping
        $data = [
        'class_id' => $request->class_id,
        'name' => $request->name,
        'roll' => $request->roll,
        'email' => $request->email,
        'phone' => $request->phone,
                ];

                //akhane extra array() wrapping jekarone error ase


                // $data = array(
                //     [
                //         'class_id' => $request->class_id,	
                //         'name' => $request->name,	
                //         'roll' => $request->roll,	
                //         'email' => $request->email,	
                //         'phone' => $request->phone,	
                //     ]
                //     );
        

            DB::table('students')->where('id',$id)->update($data);
        
            return redirect()->route('students.index')->with('success','Student updated successfully');

        // dd($request->all());


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

        DB::table('students')->where('id',$id)->delete();
        return redirect()->back()->with('success','Deleted successful');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SubcategoryController extends Controller
{
    
    
    public function index(){

       //Query builder

    //    $data = DB::table('subcategories')->leftJoin('categories','subcategories.category_id','categories.id')->select('categories.category_name','subcategories.*')->get();
   // return response()->json($data);
    //Elequent ORM -> 1. Model e function create
        $data = Subcategory::all();
        return view('admin.subcategory.index',compact('data'));
     


    }
    
    public function create(){

        $subcategory = Category::all();
        return view('admin.subcategory.create',compact('subcategory'));
    }

    public function store(Request $request){

        
        $validated = $request->validate([
            'category_id' =>'required',
            'subcategory_name' =>'required|unique:subcategories',
            
        ]);

        $subcategory = new Subcategory;
        $subcategory->category_id = $request->category_id; // Add this line to set the category_id
        $subcategory->subcategory_name = $request->subcategory_name;
        $subcategory->subcategory_slug = Str::of($request->subcategory_name)->slug('-');
        $subcategory->save();

        


        $notification = array('message'=>'Category Inserted','alert-type'=>'success');
        return redirect()->back()->with($notification);

        
    
    }



    public  function edit($id){



        $newcategory = Category::all();
        $subcategories = Subcategory::find($id);



    return view('admin.subcategory.edit',compact('newcategory','subcategories'));
    }



        public function update(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'subcategory_name' => 'required|unique:subcategories,subcategory_name,' . $id,
        ]);

        $subcategory = Subcategory::find($id);

        if (!$subcategory) {
            return redirect()->back()->with('error', 'Subcategory not found');
        }

        $subcategory->category_id = $request->category_id;
        $subcategory->subcategory_name = $request->subcategory_name;
        $subcategory->subcategory_slug = Str::of($request->subcategory_name)->slug('-');
        $subcategory->save();

        $notification = array('message' => 'Subcategory Updated', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }


    public function destroy($id){

         $subcategory = Subcategory::find($id);

         $subcategory->delete();

        

        $notification = array('message'=>'Subcategory deleted successful','alert-type'=>'success');
        return redirect()->back()->with($notification);


    }

}

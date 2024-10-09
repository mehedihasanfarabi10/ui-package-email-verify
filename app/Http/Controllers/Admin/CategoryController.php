<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    function index(){

        //Query builder

        //$category = DB::table('categories')->get();

        //Elequent data fetch ORM

         $category = Category::all();

        return view('admin.category.index',compact('category'));
    }


    function create(){


        return view('admin.category.create');
    }

    function store(Request $request){


        $validated = $request->validate([
            'category_name' =>'required|unique:categories'
        ]);

        $category = new Category;

        $category->category_name = $request->category_name;
        $category->category_slug = Str::of($request->category_name)->slug('-');
        $category->save();

        //use insert method

        // Category::insert([
        //     'category_name' => $request->category_name,
        //     'category_slug' => Str::of($request->category_name)->slug('-')
        // ]);

        return redirect()->back();
        // return view('admin.category.create');
    }



    public function edit($id){


        //Query builder

        //$data = DB::table('categories')->where('id',$id)->first();

        //Model based

        $data = Category::find($id);



        return view('admin.category.edit',compact('data'));
    }


    public function update(Request $request,$id){

        $category = Category::find($id);

        $category->update([
            'category_name' => $request->category_name,
            'category_slug' => Str::of($request->category_name)->slug('-')
        ]);

        return redirect()->route('category.index');


    }

    public function destroy($id){

        //  $category = Category::find($id);

        //  $category->delete();

         //destroy

         Category::destroy($id);
        //  Category::destroy(3,4,5);
        //Only delete 3,4   and 5 categories

        //Delete by query builder

        //DB::table("categories")->where('id',$id)->delete();

        return redirect()->route('category.index');


    }



}

<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class FrontendController extends Controller
{
    //
    public function index(){
        // $posts = "My love ";
        // Cache::add('post',$posts,now()->addDay());
        // Cache::put('post',$posts,now()->addDay());
        // Cache::forget('post'); // remove
        //Cache::forever('post'); //never delete
        // Cache::flush(); //all delete
        // $post = Post::all();
        // Cache::add('post',$post,now()->addDay());
        // Cache::get('post');

    //    dd( Cache::get('post'));

        //DB cache

        $post = Cache::remember('mypost',40,function(){ //40 seconds
            return Post::all();
        });



        //DB Cache end


        return view("welcome",compact('post'));
    }
}

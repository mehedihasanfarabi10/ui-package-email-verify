<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    //
    public function index(){

        $post = Post::all();
        return view("welcome",compact('post'));
    }
}

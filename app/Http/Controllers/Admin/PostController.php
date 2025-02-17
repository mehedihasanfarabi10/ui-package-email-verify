<?php

namespace App\Http\Controllers\Admin;

use App\Events\PostProcess;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Image;
use File;
use Illuminate\Support\Facades\Log;

class PostController extends Controller

{
    //constructor for authentication check
    public function __construct()
    {
        $this->middleware(middleware: 'auth');
    }

    public function index()
    {

        //Query builder

        //    $data = DB::table('subcategories')->leftJoin('categories','subcategories.category_id','categories.id')->select('categories.category_name','subcategories.*')->get();
        // return response()->json($data);
        //Elequent ORM -> 1. Model e function create
        //  $data = Subcategory::all();
        //  return view('admin.subcategory.index',compact('data'));

        // $posts = DB::table('posts')->get();
        $posts = Post::all();

        //3 Tables joining

        // $posts = DB::table('posts')
        //          ->leftJoin('categories','posts.category_id','categories.id')
        //          ->leftJoin('subcategories','posts.subcategory_id','subcategories.id')
        //          ->leftJoin('users','posts.user_id','users.id')
        //          ->select('posts.*','categories.category_name','subcategories.subcategory_name','users.name')
        //          ->get();

        return view('admin.post.index', compact('posts'));
    }

    public function create()
    {

        $category = Category::all();
        $subcategory = Subcategory::all();
        return view('admin.post.create', compact('category', 'subcategory'));
    }


    public function show($id)
{
    $post = Post::find($id);

    if (!$post) {
        return redirect()->route('post.index')->with('error', 'Post not found.');
    }

    return view('admin.post.show', compact('post'));
}

    

    //ChatGPT store

    public function store(Request $request)
    {

        // Validate request inputs
        $validated = $request->validate([
            'category_id' => 'required', // Make sure to validate the category
            'subcategory_id' => 'required',
            'title' => 'required',
            'post_date' => 'required',
            'description' => 'required',
            'tags' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Optional: Add size limit and allowed formats
        ]);

        // Check if status is set, if not default to 0
        $status = $request->has('status') ? $request->status : 0;

        // Retrieve category_id based on subcategory_id
        $subcat = DB::table('subcategories')->where('id', $request->subcategory_id)->first()->category_id;

        // Generate slug
        $slug = Str::of($request->title)->slug('-');


        //Event Listener data pass

        $eventData = ['title'=>$request->title,
                      'post_date'=>date('d m y',strtotime($request->post_date))];

        event(new PostProcess($eventData));

        // Prepare data array for insertion
        $data = [
            'category_id' => $subcat,
            'subcategory_id' => $request->subcategory_id,
            'title' => $request->title,
            'slug' => $slug,
            'description' => $request->description,
            'post_date' => $request->post_date,
            'tags' => $request->tags,
            'status' => $status, // Save the status (publish or draft)
            'user_id' => Auth::id(),
        ];

        // Handle image upload if exists
        if ($request->hasFile('image')) {
            $photo = $request->file('image');
            $photoName = $slug . '.' . $photo->getClientOriginalExtension();
            $photoPath = public_path('media/' . $photoName); // Store in public directory
            Image::make($photo)->resize(600, 400)->save($photoPath);
            $data['image'] = 'media/' . $photoName; // Save the path in the database
        }

        // Insert data into the posts table
        try {
            DB::table('posts')->insert($data);
        } catch (\Exception $e) {
            Log::error('Post Store Failed', ['error' => $e->getMessage()]);
        }


        // Notify user and redirect back
        $notification = array('message' => 'Post created successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }


    //  public function store(Request $request){


    //     //  $validated = $request->validate([

    //     //      'subcategory_id' =>'required',
    //     //      'title' =>'required',
    //     //      'post_date' =>'required',
    //     //      'description' =>'required',
    //     //      'tags' =>'required',
    //     //      'image'=>'required',


    //     //  ]);

    //      $subcat = DB::table('subcategories')->where('id',$request->subcategory_id)->first()->category_id;

    //      $slug = Str::of($request->title)->slug('-');

    //     $data =array();

    //     $data['category_id'] = $subcat;
    //     $data['subcategory_id'] = $request->subcategory_id;
    //     $data['title'] = $request->title;
    //     $data['slug'] =$slug;
    //     $data['description'] = $request->description;
    //     $data['post_date'] = $request->post_date;
    //     $data['tags'] = $request->tags;
    //     $data['status'] = $request->status;
    //     $data['user_id'] = Auth::id();

    //     $photo = $request->image;

    //     if($photo){
    //          $photpname = $slug.'.'.$photo->getClientOriginalExtension(); //bd.jpg
    //          Image::make($photo)->resize(600,400)->save('/public/media/'.$photpname);
    //          $data['image'] = '/public/media/'.$photpname; //databse e path sho save hobe
    //         $datas= DB::table('posts')->insert($data);




    //      $notification = array('message'=>'Post created successful','alert-type'=>'success');
    //      return redirect()->back()->with($notification);

    //     }


    //     //without image
    //     DB::table('posts')->insert($data);

    //     $notification = array('message'=>'Post created successful','alert-type'=>'success');
    //     return redirect()->back()->with($notification);




    //  }



    public  function edit($id)
    {



        $category = Category::all();
        $post = Post::find($id);



        return view('admin.post.edit', compact('category', 'post'));
    }





    public function delete($id)
    {


        $posts = Post::find($id);

        if (File::exists($posts->image)) {
            File::delete($posts->image);
        }



        $posts->delete();


        $notification = array('message' => 'Post deleted successful', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }


    public function update(Request $request, $id)
    {
        $validated = $request->validate([

            // 'subcategory_id'=>'required',
            'title' => 'required',
            'post_date' => 'required',
            'description' => 'required',
            'tags' => 'required',

        ]);

        $subcat = DB::table('subcategories')->where('id', $request->subcategory_id)->first()->category_id;

        $slug = Str::of($request->title)->slug('-');

        $data = array();

        $data['category_id'] = $subcat;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['title'] = $request->title;
        $data['slug'] = $slug;
        $data['description'] = $request->description;
        $data['post_date'] = $request->post_date;
        $data['tags'] = $request->tags;
        $data['status'] = $request->status;
        $data['user_id'] = Auth::id();

        $photo = $request->image;

        if ($photo) {

            
            //Old image deleted

            if (File::exists($request->old_image)) {
                File::delete($request->old_image);
            }

            
            $photpname = $slug . '.' . $photo->getClientOriginalExtension(); //bd.jpg
            Image::make($photo)->resize(600, 400)->save('/public/media/' . $photpname);
            $data['image'] = 'media/' . $photpname; //databse e path sho save hobe
            $datas = DB::table('posts')->update($data);




            $notification = array('message' => 'Post updated successful', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        } else {
            $data['image'] = $request->old_image;


            //without image
            DB::table('posts')->update($data);

            $notification = array('message' => 'Post updated successful', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }
    }
}

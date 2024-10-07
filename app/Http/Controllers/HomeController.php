<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use DB;

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
     
    public function hashing(Request $request)
    {
        $passwords =Hash::make( $request->password);

        return $passwords;
    }
     
    public function passchange(Request $request)
    {
        return view('passchange');
    }
     
    public function updatepass(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|max:400|min:6',
            'password_confirmation' => 'required|same:password'
        ]);
    
        $user = Auth::user();
    
        // Check if the current password is correct
        if (Hash::check($request->current_password, $user->password)) {
            // Update the password with the new one
            // $user->password = Hash::make($request->password);
            // $user->save();

            //2nd way


            $data = array(
                'password'=> Hash::make($request->password),
            );

            DB::table('users')->where('id',$user)->update($data);
            Auth::logout();
            return redirect()->route('login');
    
            // return redirect()->back()->with('success', 'Password changed successfully');
        } 
        else if($request->password !==$request->password_confirmation){
            return redirect()->back()->with('error','New password and confirm password didnt match');
        }
        else {
            return redirect()->back()->with('error', 'Current password not matched.');
        }
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

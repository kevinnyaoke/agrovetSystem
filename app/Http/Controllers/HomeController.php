<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use App\Traits\UploadTrait;
use Auth;

class HomeController extends Controller
{
    use UploadTrait;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('user.home');
    }

    public function userhome(){
        $user=Auth::user()->photo;
        return view('user.dashboard')->with(['photo'=>$user]);
    }

    public function loadpic(Request $request){
        $request->validate([
            'name' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:10000'
        ]);

        
        $user = User::findOrFail(auth()->user()->id);// Get current user
        $user->name = $request->input('name');// Set user name
        if ($request->has('photo')) {  // Check if a profile image has been uploaded
            $image = $request->file('photo');// Get image file
            $extension=$image -> getClientOriginalExtension();
            $filename = time() . '.' . $extension; 
            $image ->move( 'uploads/images/', $filename);// Define folder path
            $user->photo= $filename;// Set user profile image path in database to filePath
        }else{
            return $request;
            $user->image='';
        }

        $user->save(); // Persist user record to database

        // Return user back and show a flash message
        return view('user.dashboard')->with('success','photo updated successfully');
    }

    
}

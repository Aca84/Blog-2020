<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Posts;

class HomeController extends Controller
{
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
 
        // $posts = Auth::user('id')->posts()->get();
        $user_id = auth()->user()->id;
        $user = User::find($user_id)->posts()->paginate(5);
        // $user = User::find($user_id);


        return view('home')->with('posts',$user);
        // return view('home')->with('posts',$user->posts->sortByDesc('created_at'));
        // return view('home')->with('posts',$posts->sortByDesc('created_at'));
    }
}

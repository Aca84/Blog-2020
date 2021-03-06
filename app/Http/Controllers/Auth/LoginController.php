<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use DB;
use App\Models\Posts;
use Redirect;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    use AuthenticatesUsers;
    /**
     * Where to redirect users after login.
     *
     * @var string
     */  
    // protected $redirectTo = RouteServiceProvider::HOME; 
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        return redirect('/posts/index');
    }
    // public function authenticated(Request $request, $user)
    public function admin(Request $request, Auth $user)
    {
        // $posts = Posts::all()->sortByDesc('created_at'); //shows all posts (count) in admin panel, but no pagination
        $posts = Posts::orderBy('created_at','desc')->paginate(5); // shows all posts with pagination,and count all with total in view 
        
        if (Auth::check() && Auth::user()->role == 'admin') {
            return view('/admin', compact('posts'));
        }   
        if (Auth::check() && Auth::user()->role == 'user') {
            return redirect('/home');
        } 
        return redirect('/posts');     
    }
   
}

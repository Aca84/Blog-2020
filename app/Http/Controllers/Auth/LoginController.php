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
        // $role = Auth::user('admin');

        // dd($role);
        // print_r($role);
        // $role = $user->role;
        // $role = Auth::user();

        // if ($role->(['admin'])) {

        //     return view('/admin');
        // }

        // if ($role->(['admin'])) {
        //     return view('/admin');
        // }
        // if ($role === ['user']) {
        //     return redirect('/home');
        // }
        // return redirect('/posts/index');

        // dd(auth()->user()->role);
        // dd(Auth::user()->name);
        // dd(Auth::user(['name']));
        // $user = Auth::user();
       
        // $posts = Posts::orderBy('created_at','desc');
        $posts = Posts::all()->sortByDesc('created_at');

        // dd($posts);

        if (Auth::check() && Auth::user()->role == 'admin') {
            // if (Auth::user(['role']) === 'admin') {


            return view('/admin', compact('posts'));
            // return view('/admin')->with('posts', $posts);
        }
            
        if (Auth::user()->role == 'user') {
            return redirect('/home');
        } 

        return redirect('/posts');     
    }
   
}

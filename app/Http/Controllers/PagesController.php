<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Posts;
use App\Models\User;

class PagesController extends Controller
{
    public function index(){
        // $title = 'Welcome To Laravel!';
        // //return view('pages.index', compact('title'));
        // return view('pages.index')->with('title', $title);

        $posts = Posts::orderBy('created_at','desc')->paginate(5);
        return view('posts.index')->with('posts', $posts);
    }

    public function about(){
        $title = 'About Blog 2020';
        return view('pages.about', compact('title'));
    }
    public function user(){
        $title = 'User stranica';
        return view('pages.user')->with('title', $title);
    } 
}
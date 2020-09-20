<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function index(){
        // return view('pages.index');
    }
    public function about(){
        $title = 'About Blog 2020';
        return view('pages.about', compact('title'));
    }

    public function user(){
        $title = 'User stranica';
        return view('pages.user')->with('title', $title);
    }

    // public function create(){
    //     $title = 'Create post stranica';
    //     return view('pages.create')->with('title', $title);
    // }
}
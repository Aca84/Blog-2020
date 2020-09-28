<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     * 
     */
    // public function getData(Request $request){

    //     return $request->all();
    // }


    public function search(Request $request)
    {
    	$posts = Posts::search('search')->get();

    }
    
}

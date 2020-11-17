<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except'=>['index','show','search']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Posts::orderBy('created_at','desc')->paginate(5);
        return view('posts.index')->with('posts', $posts);
    }
    // ** function for searching the posts **//
    public function search(Request $request){

        $request->validate(
            ['search'=>'required|min:1']
        );
        $query = $request->input('search');

        $posts = Posts::where('title', 'like', "%$query%")->get();
        return view('search')->with('posts', $posts);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response 
     */
    public function create()
    {
        return view('posts.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);      
        //Create post
        $post = new Posts;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->save();

        return redirect('/posts');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Posts::find($id);
        return view('posts/show')->with('post',$post);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Posts::find($id);

        if (Auth::user()->role == 'admin') {
            return view('posts/edit')->with('post',$post);
        }
        // Check if it logged user auth for edit
        if(Auth::user()->id !== $post->user_id){
            return redirect('/posts')->with('error', 'No no no, you must be logged an admin for that');
        }
        return view('posts/edit')->with('post',$post);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);
        
        //Create post
        $post = Posts::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();

        if (Auth::user()->role == 'admin') { 
            return redirect('/admin')->with('Well done');
        }
        return redirect('/home')->with('success', 'Post updated!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Posts::find($id);

        if (Auth::user()->role == 'admin') {
            $post->delete();
            return redirect('/admin')->with('success','Admin deleted the Post');
        }
        // Check if it logged user auth old
        if(Auth::user()->id !== $post->user_id){  //new way with auth included up
            return redirect('/posts')->with('error', 'no no no');
        }
        $post->delete();
        return redirect('/posts')->with('success','Post deleted');
    }
}

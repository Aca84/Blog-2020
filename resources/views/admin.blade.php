@extends('layouts.app')
@section('content')

<h3 class="text-center">Admin dashboard</h3>
<hr>
<h5 class="text-center">Ukupno {{$posts->count()}} post-a</h5>
<hr>
{{-- @if (count($posts ?? '')>0) --}}
@foreach ($posts as $post)

<div class="card my-2  shadow" style="width: 100%;">

    <div class="card-header bg-transparent">
      <h3><a class="text-decoration-none text-dark" href="/posts/{{$post->id}}">{{$post->title}}</a></h3>     
    </div>
    
    <div class="text my-2 p-3 text-justify" style="max-width: 100%;">
      <p class="text "> 
        {{$post->body}}
      </p>        
      <a href="/posts/{{$post->id}}">Read more</a>         
    </div>

    <small class="text-muted my-2 p-3">by {{$post->user->name}} on {{$post->created_at->format('d-m-yy H:i')}}</small>
    
    <div class="mx-2 mb-1 bg-info rounded p-1">
        <a href="/posts/{{$post->id}}/edit" class="btn btn-light">Edit</a>
        {!!Form::open(['action'=>['App\Http\Controllers\PostsController@destroy', $post->id],'method'=>'POST', 'class'=> 'float-right'])!!}
        {{Form::hidden('_method', 'DELETE' )}}
        {{Form::submit('Delete', ['class'=> 'btn btn-danger'])}}
        {!!Form::close()!!}
    </div>

  </div>
@endforeach
{{-- @else --}}
{{-- <p><i>No posts for now</i></p> --}}
{{-- @endif --}}
@endsection

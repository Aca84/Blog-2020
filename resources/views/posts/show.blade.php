@extends('layouts.app')
@section('content')

<a href="/posts" class="btn-sm btn-secondary px-3 my-2">Back</a>

<div class="card my-3 shadow" style="max-width: 100%;">
    <div class="card-header bg-transparent">
        <h3>{{$post->title}}</h3>
    </div>
    <div class="text-show  p-3 text-justify" style="max-width: 100%;">
        {!!$post->body!!}
    </div>
    <small class="text-muted my-2 p-3">by {{$post->user['name']}} on {{$post->created_at->format('d-m-yy H:i')}}</small>
    <div class="card-footer bg-transparent mx-2">
        {{-- Checking if is guest and if is loged user rights to edit/delete --}}
        @if (!Auth::guest())
        @if (Auth::user()->id == $post->user_id)
        <a href="/posts/{{$post->id}}/edit" class="btn-sm btn-outline-primary mb-2">Edit</a>
        {!!Form::open(['action'=>['App\Http\Controllers\PostsController@destroy', $post->id],'method'=>'POST', 'class'
        => 'float-right mr-3'])!!}
        {{Form::hidden('_method', 'DELETE' )}}
        {{Form::submit('Delete', ['class'=> 'btn-sm btn-outline-danger'])}}
        {!!Form::close()!!}
        {{-- @else --}}
        @endif
        @endif
    </div>
</div>
@endsection

@extends('layouts.app')
@section('content')
    <a href="/posts" class="btn btn-outline-secondary my-2">Back</a>
    <h2>{{$post->title}}</h2>
    <div class="card border-primary my-5 p-2 text-wrap" style="max-width: 100%;">
        {!!$post->body!!}
    </div>
    <small class="text-muted">Written on {{$post->created_at->format('d-m-yy H:i')}}</small>
    <hr>

    @if (!Auth::guest())
        @if (Auth::user()->id == $post->user_id)
            <a href="/posts/{{$post->id}}/edit" class="btn-sm btn-outline-secondary mb-2">Edit</a>
            {!!Form::open(['action'=>['App\Http\Controllers\PostsController@destroy', $post->id],'method'=>'POST', 'class' =>  'float-right mr-3'])!!}
                {{Form::hidden('_method', 'DELETE' )}}
                {{Form::submit('Delete', ['class'=> 'btn-sm btn-outline-danger'])}}
            {!!Form::close()!!}
            {{-- @else --}}
        @endif
    @endif
@endsection

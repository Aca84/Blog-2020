@extends('layouts.app')
@section('content')
{{-- current date and time in .. --}}
{{
    now()->setTimezone('Europe/Belgrade')->format('d-m-yy H:i')
}}


<h3 class="text-center">Admin posts dashboard</h3>
<hr>
<h6 class="text-center">Ukupno {{$posts->total()}} post-a</h6>
{{-- {{Auth::user()->email}} prikazuje samo za ulogovanog korisnika --}}
<hr class="bg-secondary">
{{-- ForEach --}}
@foreach ($posts as $post)

<div class="card my-3 shadow" style="width: 100%;">
    {{-- Post title --}}
    <div class="card-header bg-transparent">
        <h3><a class="text-decoration-none text-dark" href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
    </div>
    {{-- Post body --}}
    <div class="text p-3 text-justify" style="max-width: 100%;">
        <p class="text-body">
            {!! $post->body !!}
        </p>
        <a href="/posts/{{$post->id}}">Read more</a>
    </div>
    {{-- Author if post --}}
    <small class="text-muted my-2 p-3">by {{$post->user['name']}} on {{$post->created_at->format('d-m-yy H:i')}}</small>
    {{-- Edit and Delete --}}
    <div class="mx-2 mb-1 bg-info rounded p-1">
        <a href="/posts/{{$post->id}}/edit" class="btn btn-light">Edit</a>
        {!!Form::open(['action'=>['App\Http\Controllers\PostsController@destroy', 
            $post->id,'id' => 'myForm'],'method'=>'POST', 'class'=>
        'float-right'])!!}
        {{Form::hidden('_method', 'DELETE' )}}
        {{Form::submit('Delete', ['class'=> 'btn btn-danger'])}}
        {!!Form::close()!!}
    </div>

</div>
@endforeach
    <div class="pagination justify-content-center">{{$posts->links()}}</div>
@endsection

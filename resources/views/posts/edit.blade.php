@extends('layouts.app')
@section('content')
    
    <h2 class="mt-3">Edit post stranica</h2>
    <div style="max-width: 100%;">
    {!! Form::open(['action' => ['App\Http\Controllers\PostsController@update', $post->id], 'method' => 'POST']) !!}

    <div class="form-group">
        {{Form::label('title', 'Title')}}  
        {{Form::text('title',$post->title,['class' => 'form-control','placeholder'=>'Title', 'w-70'])}}         
    </div>
    <div class="form-group">
        {{Form::label('body', 'Body')}}  
        {{Form::textarea('body',$post->body,['id'=>'editor','class' => 'form-control','placeholder'=>'Body text', 'w-70'])}}        
    </div>
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Edit!!',['class'=> 'btn btn-outline-dark mb-2'])}}
    
        {!! Form::close() !!}
</div>
@endsection
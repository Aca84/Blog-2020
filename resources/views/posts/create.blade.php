@extends('layouts.app')
@section('content')
    
<h2 class="mt-3">Create post stranica</h2>

<div style="max-width: 100%;">
        {!! Form::open(['action' => 'App\Http\Controllers\PostsController@store', 'method' => 'POST']) !!}

    <div class="form-group"> 
        {{Form::label('title', 'Title')}}                      
        {{Form::text('title','',['class' => 'form-control','placeholder'=>'Title', 'w-70'])}}  
    </div>

    <div class="form-group">  
        {{Form::label('body', 'Body')}}  
    {{-- <div id="editor"> --}}
        {{Form::textarea('body','',['id'=>'editor','class'=>'form-control','placeholder'=>'Body text', 'w-70'])}} 
    {{-- </div>  --}}
    </div>
        {{Form::submit('Publish!',['class'=>'btn btn-outline-success w-25 float-right'])}}    
        {!! Form::close() !!}
</div>
@endsection

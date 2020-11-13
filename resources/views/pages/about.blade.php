@extends('layouts.app')
@section('content')

<div class="card my-3 shadow" style="max-width: 100%;">
    <div class="card-header bg-transparent">

        <h3>{{ $title }}</h3>
    </div>
    <div class="text p-3 text-justify" style="max-width: 100%;">
        <p class="text-body">
            This is simple text blog.
            Created in Laravel 8, using bootstrap 4 and html-css. 
            No JavaScript included for now.
                
            Be nice, create some great texts and enjoy reading some.
        </p>
    </div>
</div>

@endsection
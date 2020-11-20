@extends('layouts.app')
@section('content')

    <div class="my-5" style="max-width: 100%;">
        <div class="card-header bg-transparent text-center border-0 rounded">
            @if (session('status'))
                <div class="alert alert-success" role="alert">       
                    {{ session('status') }}
                </div>
            @endif
                {{-- Button create post --}}
                <a class="btn btn-outline-secondary float-right" href="/posts/create">Create</a>
                {{-- Ukupno postova user-a --}}
                <h5 class="my-2"><small>Ukupno  {{$posts->total()}} 
                    post-a by</small> {{ __(Auth::user()->name) }}</h5>
        </div>
        {{-- Prikaz postova user-a --}}
        <div class="">
            @foreach ($posts as $p)
            <div class="card mb-5 shadow" style="max-width: 100%;">
                <div class="card-header bg-transparent"><h3>{{$p->title}}</h3></div>
                <div class="text my-5 p-3 text-justify" style="max-width: 100%;">
                    {!!$p->body!!}
                </div>
                <small class="text-muted my-2 p-3">by {{$p->user['name']}} 
                    on {{$p->created_at->format('d-m-yy H:i')}}</small>
                <div class="card-footer bg-transparent mx-2">
                    <a href="/posts/{{$p->id}}/edit" 
                        class="btn-sm btn-outline-primary mb-2 text-decoration-none">Edit</a>
                    {!!Form::open(['action'=>
                        ['App\Http\Controllers\PostsController@destroy', $p->id],'method'=>'POST', 
                        'class' =>  'float-right mr-3'])!!}
                    {{Form::hidden('_method', 'DELETE' )}}
                    {{Form::submit('Delete', ['class'=> 'btn-sm btn-outline-danger'])}}
                    {!!Form::close()!!}
                </div>
            </div>
            @endforeach
            <div class="pagination justify-content-center">{{$posts->links()}}</div>
        </div>
    </div> 
@endsection

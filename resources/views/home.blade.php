@extends('layouts.app')

@section('content')
    <div class="card border-primary my-5" style="max-width: 100%;">
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">       
                    {{ session('status') }}
                </div>
            @endif
                <a class="btn btn-outline-secondary float-right" href="/posts/create">Create</a>
                    <p>Postovi by {{ __(Auth::user()->name) }}</p>
        </div>
        <hr>
        <div class="card-body">
            @foreach ($posts as $p)
            <div class="card  mb-3 shadow" style="max-width: 100%;">
                <div class="card-header bg-transparent border-secondary mx-2"><h3>{{$p->title}}</h3></div>
                <div class="my-5 p-3 text-justify" style="max-width: 100%;">
                    {!!$p->body!!}
                </div>
                <small class="text-muted p-3">Written on {{$p->created_at->format('d-m-yy H:i')}}</small>
                <div class="card-footer bg-transparent border-info mx-2">
                    <a href="/posts/{{$p->id}}/edit" class="btn-sm btn-outline-primary mb-2 text-decoration-none">Edit</a>
                    {!!Form::open(['action'=>['App\Http\Controllers\PostsController@destroy', $p->id],'method'=>'POST', 'class' =>  'float-right mr-3'])!!}
                    {{Form::hidden('_method', 'DELETE' )}}
                    {{Form::submit('Delete', ['class'=> 'btn-sm btn-outline-danger'])}}
                    {!!Form::close()!!}
                </div>
            </div>
                <hr>
                {{-- <div class="text-center mb-3 text-secondary">{{$posts->links()}}</div> --}}
            @endforeach
        </div>
    </div> 
@endsection

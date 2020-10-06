@extends('layouts.app')
@section('content')

<h3 class="text-center">Admin dashboard</h3>
<hr>
<h5 class="text-center">Ukupno {{$posts->count()}} post-a</h5>

{{-- @if (count($posts)>0) --}}
@foreach ($posts as $post)

    <table class="table table-responsive table-hover">
        <thead>
            <tr>
                <th scope="col">{{$post->id}}. {{$post->title}}
                    <small class="text-muted my-2 p-3">Written by {{$post->user->name}} on {{$post->created_at->format('d-m-yy H:i')}}</small>
                    <td scope="col">
                        <ul class="list-group list-group-horizontal">
                            <li class="list-group-item">
                                <a href="/posts/{{$post->id}}/edit" class="btn-sm btn-outline-primary mb-2 text-decoration-none">Edit</a>
                            </li>
                            <li class="list-group-item">                    
                                {!!Form::open(['action'=>['App\Http\Controllers\PostsController@destroy', $post->id],'method'=>'POST', 'class' =>  'float-right mr-3'])!!}
                                {{Form::hidden('_method', 'DELETE' )}}
                                {{Form::submit('Delete', ['class'=> 'btn-sm btn-outline-danger'])}}
                                {!!Form::close()!!}
                            </li>
                        </ul>
                    </td>
                </th>    
            </tr>
        </thead>
        <tbody class="text-wrap text-break">
            <tr>
                <td scope="col-12">{{$post->body}}</td>
            </tr>
        </tbody>
    </table>

@endforeach
{{-- @else --}}
{{-- <p><i>No posts for now</i></p> --}}
{{-- @endif --}}

@endsection

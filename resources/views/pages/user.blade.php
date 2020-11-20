@extends('layouts.app')
@section('content')

<h3 class="text-center">Admin Users dashboard</h3>  

<div class="table-responsive">
    <table class="table table-hover">
        <thead>
        <tr>
            {{-- <th scope="col">#</th> --}}
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Joined</th>
            <th scope="col">Banned?</th>
            <th scope="col">delete</th>
        </tr>
        </thead>
        <tbody>
        {{-- @for ($i = 0; $i < 10; $i++) --}}
        @foreach ($user as $u)
        <tr>
            {{-- <th scope="row">1</th> --}}
            <td>{{$u->name}}</td>
            <td>{{$u->email}}</td>
            <td>{{$u->created_at->format('d-m-yy H:i')}}</td>
            <td>
                <input type="date" id="ban" class="form-control w-75" >
            </td>
            <td>
                {!!Form::open(['action'=>['App\Http\Controllers\UserController@destroy', $u->id],'method'=>'POST', 'class'=>
                'float-left'])!!}
                {{Form::hidden('_method', 'DELETE' )}}
                {{Form::submit('Delete', ['class'=> 'btn btn-danger'])}}
                {!!Form::close()!!}            
            </td>
        </tr>
        @endforeach
    {{-- </table> --}}
        
        {{-- @endfor --}}
        </tbody>
    </table>
</div>
@endsection

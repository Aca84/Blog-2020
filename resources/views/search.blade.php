@extends('layouts.app')
@section('content')
    {{-- dugme za povratak na sve postove u blogu --}}
    <a href="/posts" class="btn-sm btn-secondary px-3 ">Back</a>
    {{-- <form method="GET" action="{{ route('search') }}">
        <div class="row">
            <div class="col-md-6">
                <input type="text" name="query" id="query" class="form-control" placeholder="Search">
            </div>
            <div class="col-md-6">
                <button class="btn btn-info">Search</button>
            </div>
        </div>
    </form> --}}
            <h3 class="my-3">Search results</h3>
                {{-- prikazivanje broja nadjenih postova --}}
                <p>{{$posts->count()}} result's for '{{request()->input('query')}}' </p>

            @if(count($posts) > 0)
                @foreach($posts as $p)
                {{-- poscetak kartice  --}}
                <div class="card my-3 p-3 shadow" style="width: 100%;"> 
                    <div class="card-title bg-transparent border-secondary mx-2">
                        <h3>
                            <a class="text-decoration-none" href="/posts/{{$p->id}} ">{{$p->title}}</a>
                        </h3>
                    </div>               
                    <div class="my-2 p-3 text-justify" style="max-width: 100%;">
                        <p class="card-text text-sm-justify text-break"> {{$p->body}}</p>           
                        <small class="text-muted">Written by {{$p->user->name}} on {{$p->created_at->format('d-m-yy H:i')}}</small>
                    </div>      
                </div>    
                {{-- kraj kartice --}}
            @endforeach
        @else
        <tr>
            <td colspan="3" class="text-danger py-5"><h4>Result not found.</h4></td>
        </tr>
        @endif
        {{-- {{ $posts->links() }} --}}
@endsection
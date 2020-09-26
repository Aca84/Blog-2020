@extends('layouts.app')

@section('content')
    {{-- datum --}}
    {{date('d-m-yy')}}
    {{-- search forma --}}
    <form class="form-inline my-2 my-lg-0 justify-content-end" method="GET" action="{{ route('search') }}">
      <input class="form-control mr-sm-2 " type="search" placeholder="Search" aria-label="Search" name="query" id="query">
      <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search</button>
    </form>
    {{-- prikazivanje svih postova u index-u --}}
    @if (count($posts)>0) 
        @foreach ( $posts as $post)
        {{-- <div class="card  my-3 mb-3 shadow" style="width: 100%;">
            <div class="card-body text-secondary">
              <h5 class="card-title border-secondary mx-2 text-dark"><a class="text-decoration-none" href="/posts/{{$post->id}} ">{{$post->title}}</a></h5>
                <p class="card-text text-sm-justify text-break"> {{$post->body}}</p>
            <small class="text-muted">Written by {{$post->user->name}} on {{$post->created_at->format('d-m-yy H:i')}}</small>
            </div>
          </div> --}}

          <div class="card my-3 p-3 shadow" style="width: 100%;">

            <div class="card-header bg-transparent mx-2">
              <h3><a class="text-decoration-none" href="/posts/{{$post->id}} ">{{$post->title}}</a></h3>
            </div>
            
            <div class="text my-2 p-3 text-justify" style="max-width: 100%;">
              <p class="text"> 
                {{$post->body}}
                <a href="#">More..</a>
              </p>            
              <small class="text-muted">Written by {{$post->user->name}} on {{$post->created_at->format('d-m-yy H:i')}}</small>
            </div>

          </div>
        @endforeach
        <div class="pagination justify-content-center">{{$posts->links()}}</div>     
        {{-- {{$posts->links()}} --}}
    @else
       <p><i>No posts for now</i></p>     
    @endif
@endsection
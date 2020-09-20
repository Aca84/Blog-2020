@extends('layouts.app')

@section('content')
    {{-- <h3 class="mt-2">Posts</h3> --}}
    {{-- <div class="card border-primary mt-2 mb-5 float-right" style="width: 23%; height: 1000px;" > <!--sidebar-->
      <div class="card-header border-primary text-monospace text-center">
        {{date('H:i')}} 
        {{-- {{now('H:i:s')}} --}}
      {{-- </div>
      <div class="card-body text-secondary">
        <h5 class="card-title">Primary card title</h5>
        <p class="card-text"></p>
      </div>
    </div> --}}

    @if (count($posts)>0)
        @foreach ( $posts as $post)
        <div class="card border-primary my-5" style="width: 100%;">
            <div class="card-body text-secondary">
              <h5 class="card-title text-dark"><a class="text-decoration-none" href="/posts/{{$post->id}} ">{{$post->title}}</a></h5>
                <p class="card-text text-sm-justify "> {{$post->body}}</p>
            <small class="text-muted">Written by on {{$post->created_at->format('d-m-yy H:i')}}</small>
            </div>
          </div>
        @endforeach
        <div class="text-center mb-5">{{$posts->links()}}</div>     
    @else
       <p>No posts yet</p>     
    @endif
@endsection
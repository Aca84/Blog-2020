@extends('layouts.app')
@section('content')
    {{-- Post display --}}
    @if (count($posts)>0) 
        @foreach ( $posts as $post)

          <div class="card my-3 shadow" style="width: 100%;">
            {{-- Post title --}}
            <div class="card-header bg-transparent">
              <h3><a class="text-decoration-none text-dark" href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
            </div>
            {{-- Post body --}}
            <div class="text p-3 text-justify" style="max-width: 100%;" id="body-text">
              <p class="text-body" id="body-text"> 
                {!! html_entity_decode($post->body) !!}
              </p>
              <a href="/posts/{{$post->id}}">Read more</a>         
            </div>
            <small class="text-muted my-2 p-3">by {{$post->user['name']}} on {{$post->created_at->format('d-m-yy H:i')}}</small>
          </div>
        @endforeach
          {{-- Pagination --}}
          <div class="pagination justify-content-center">{{$posts->links()}}</div>     
    @else
       <p><i>No posts for now</i></p>     
    @endif
@endsection
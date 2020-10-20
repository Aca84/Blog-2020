@extends('layouts.app')

@section('content')
    {{-- datum --}}
    {{-- {{date('d-m-yy')}} --}}
    {{-- prikazivanje svih postova u index-u --}}
    @if (count($posts)>0) 
        @foreach ( $posts as $post)

          <div class="card my-3 shadow" style="width: 100%;">

            <div class="card-header bg-transparent">
              <h3><a class="text-decoration-none text-dark" href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
            </div>
            
            <div class="text p-3 text-justify" style="max-width: 100%;">
              <p class="text-body"> 
                {{-- <span class="text-body">
                  {{$post->body}}
                </span> --}}
                {{$post->body}}
              </p>        
              <a href="/posts/{{$post->id}}">Read more</a>         
            </div>
            <small class="text-muted my-2 p-3">by {{$post->user['name']}} on {{$post->created_at->format('d-m-yy H:i')}}</small>

          </div>
        @endforeach
          <div class="pagination justify-content-center">{{$posts->links()}}</div>     
    @else
       <p><i>No posts for now</i></p>     
    @endif
@endsection
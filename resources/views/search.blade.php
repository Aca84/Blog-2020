@extends('layouts.app')
@section('content')
{{-- dugme za povratak na sve postove u blogu --}}
<a href="/posts">
    <i class="back fas fa-reply"> back</i>
</a>
    <h3 class="my-3">Search results</h3>
    {{-- prikazivanje broja nadjenih postova --}}
    <p>{{$posts->count()}} result's for '{{request()->input('search')}}' </p>

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
        <td colspan="3" class="text-danger py-5"><h4>Nothing found.</h4></td>
    </tr>
    @endif
        {{-- {{ $posts->links() }} --}}
@endsection
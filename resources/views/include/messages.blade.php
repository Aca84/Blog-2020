@if (count($errors)>0)
    @foreach ($errors->all() as $err)
        <div class="alert alert-danger my-2 w-75 text-center ml-3 mx-auto">     
            {{$err}}
        </div>
    @endforeach
@endif

{{-- @if (session('success'))
        <div class="alert alert-success my-2 w-25 text-center">
            {{session('success')}}
        </div>  
@endif --}}

@if (session('error'))
        <div class="alert alert-danger my-2 w-75 text-center mx-auto">      
            {{session('error')}}
        </div>  
@endif

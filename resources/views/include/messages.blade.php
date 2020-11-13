@if (count($errors)>0)
    @foreach ($errors->all() as $err)
        <div id="alert" class="alert alert-danger my-2 w-25 text-center ml-3 mx-auto">  
            <button type="button" class="close" data-dismiss="alert">x</button>   
            {{$err}}
        </div>
    @endforeach
@endif

@if (session('success'))
    <div id="alert" class="alert alert-success my-2 w-25 text-center mx-auto">   
        <button type="button" class="close" data-dismiss="alert">x</button>     
        {{session('success')}}
    </div>  
@endif

@if (session('error'))
    <div id="alert" class="alert alert-danger my-2 w-25 text-center mx-auto">   
        <button type="button" class="close" data-dismiss="alert">x</button>   
        {{session('error')}}
    </div>  
@endif

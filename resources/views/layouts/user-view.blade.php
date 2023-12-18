@extends('app')

@section('header')
<x-header/>
@endsection

@section('content')
<div class='flex-grow' >
    <div class="flex">
        
        <div class="">
            <!--user img-->
            <img src="" alt="">
        </div>
        <!--user data-->
        <div>
            <div>
                <p class="font-semibold">{{$user->username}}</p>
            </div>

            <div>
                <span> posts</span>
                <span> followes</span>
                <span> following</span>
            </div>
            <div>
                <p>{{$user->name}}</p>
                <p>descripcion</p>
            </div>

        </div>

       
    </div>

    
    

</div>


@endsection

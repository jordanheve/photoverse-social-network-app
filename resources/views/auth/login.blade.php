@extends('app')

@section('content')
<div class="flex justify-center items-center gap-10">
    <div class="max-w-md max-lg:hidden">   
        <img src="/img/login-img.jpg" alt="capture the moment">
    </div>
    <!--register form-->
    <div class="max-w-md w-full">
        <div class="border p-6 max-w-md">
            <h1 class="text-4xl mb-10 font-extralight italic text-center">Photoverse</h1>
           <livewire:login-form/>
           <p class="text-center">
               <a href="{{route('forgot-password.index')}}" class=" text-xs underline">Forgot password?</a>
           </p>
        </div>
        <div class="border p-6 mt-3 text-center gap-4 justify-center items-center">
            <p class="text-sm">Don't have an account? <a href="{{route('sign-up')}}" class="text-sky-500 font-semibold">Sign up</a></p>
        </div>
        
    </div>
</div>



@endsection
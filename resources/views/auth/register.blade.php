@extends('app')

@section('content')
<div class="flex flex-col items-center">
    
    <!--register form-->
    <div>
        <div class="border px-9 py-10 max-w-sm flex flex-col gap-4 justify-center items-center">
            <h1 class="text-4xl font-extralight italic">Photoverse</h1>
            <p class="text-slate-500 font-semibold text-center">Sign up to see photos from your friends</p>
          <livewire:register-form/>
        </div>
        <div class="border p-6 mt-3 text-center gap-4 justify-center items-center">
            <p class="text-sm">Have an account? <a href="{{route('login')}}" class="text-sky-500 font-semibold">Log in</a></p>
        </div>
        
    </div>
</div>



@endsection
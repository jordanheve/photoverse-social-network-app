@extends('app')

@section('header')
<x-header/>
@endsection

@section('content')
<Section>
    <p class="text-center font-bold lg:mb-10 text-3xl text-slate-800">
        {{$post->title}}
    </p>
    <div class="mx-auto container shadow flex max-lg:flex-col">   
        
        <div class="lg:w-1/2">
            <img src="{{asset('storage').'/'.$post->image}}" alt="">
            
            
            
            <div class="flex flex-col m-4 gap-2">
                <div class="flex justify-between">

                    <livewire:likes :post='$post'  />

                    @auth
                    @if($post->user_id === auth()->id())
                    <x-delete-post :post="$post" />
                    @endif
                    @endauth
                </div>
                <a href="{{route('user.index',  $post->user)}}">

                    <p class="font-semibold text-slate-800">
                        {{$post->user->username}}
                    </p>
                </a>
                <p class="text-xs text-slate-500">
                    {{$post->created_at->diffForHumans()}}
                </p>
                
                <p class="text-slate-800">
                    {{$post->description}}
                </p>
               
            </div>
        </div>
        
        
        <div class="lg:w-1/2 p-5 bg-white">
            <livewire:comments :post='$post'/>

           
        </div>
    </div>
    
</Section>
    @endsection
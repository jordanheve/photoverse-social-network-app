@extends('app')

@section('header')
<x-header/>
@endsection

@section('content')
<Section>
    <p class="text-center font-bold mb-10 text-3xl">
        {{$post->title}}
    </p>
    <div class="mx-auto container flex">   
        
        <div class="md:w-1/2 ">
            <img class="rounded" src="{{asset('storage').'/uploads'.'/'.$user->id.'/'.$post->image}}" alt="">
            
            
            
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

                    <p class="font-semibold">
                        {{$post->user->username}}
                    </p>
                </a>
                <p class="text-xs text-slate-500">
                    {{$post->created_at->diffForHumans()}}
                </p>
                
                <p>
                    {{$post->description}}
                </p>
               
            </div>
        </div>
        
        
        <div class="md:w-1/2 p-5 bg-white">
            <livewire:comments :post='$post'/>

           
        </div>
    </div>
    
</Section>
    @endsection
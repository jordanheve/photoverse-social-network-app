@extends('app')

@section('header')
<x-header/>
@endsection

@section('content')
<main class="flex flex-col items-center flex-grow py-4">

   @forelse ($posts as  $post)
        <div class="bg-zinc-200">
            <x-post-preview  :post="$post" />
            <a href="{{route('user.index', $post->user)}}">

                <p class="font-semibold">{{$post->user->username}}</p>
            </a>
            <p>
                {{$post->created_at->diffForHumans()}}
             </p>
            <p>
                <span >
                    {{$post->likes->count()}}
                </span> 
                {{ \Illuminate\Support\Str::plural('like', $post->likes->count() )}}    
            </p>
        </div>
       

   @empty
        <p class="font-bold text-4xl">No posts to show</p>
   @endforelse

   <div class="mt-4">
    {{$posts->links('pagination::tailwind')}}
</div>

</main>


@endsection

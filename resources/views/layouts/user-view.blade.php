@extends('app')

@section('header')
<x-header/>
@endsection

@section('content')
<div class='flex-grow flex-col flex items-center' >
    <div class="flex items-center gap-4 p-4 ">
        
        <div class="h-28 w-28">
            <!--user img-->
            @if ($user->image)
                <img class="h-full w-full rounded-full object-cover mx-auto" src="{{asset('storage').'/uploads'.'/'.$user->id.'/'.'profile/'.$user->image}}" alt="profile picture">
            @else

            <img src="/img/profile-picture.png" class="rounded-full objet-cover" alt="profile picture">
            @endif

        </div>
        <!--user data-->
        <livewire:user-stats :postCount="$posts->count()" :user="$user"/>

        @auth
        @if($user->id===auth()->id())
            <a href="{{route('edit.index')}}" title="edit profile" >
                <x-heroicon-m-pencil-square class="text-slate-500 h-5" />
            </a>
        @endif
    @endauth
       
    </div>

    
    <section class="max-w-7xl px-2">

        @if($posts->count())

        <h2 class="text-4xl font-semibold text-center text-slate-800 my-2">Posts</h2>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5">


            @foreach($posts as $post)


            <a class="" href="{{route('user.show', ['user' => $user, 'post' => $post])}}">
            <figure class="rounded-lg  relative aspect-square max-w-sm w-full h-full overflow-hidden transition-all duration-300 cursor-pointer group z-20">
                <div class="relative h-full">
                  <div class='bg-gradient-to-t from-black opacity-50 to-30% h-full w-full absolute z-10'></div>
                    <img class="rounded-lg object-cover w-full h-full transform transition duration-300 ease-in-out group-hover:scale-110" src="{{asset('storage').'/uploads'.'/'.$user->id.'/'.$post->image}}" alt="{{$post->title}} picture">
                    <figcaption class="absolute px-4 text-lg text-white bottom-6 z-20">
                        <p>{{$post->title}}</p>
                    </figcaption>
                </div>
            </figure>
        </a>
  

            @endforeach
        </div>
        <div class="mt-4">
            {{$posts->links('pagination::tailwind')}}
        </div>
        @else
            <p class="text-xl font-bold">No posts to show</p>
        @endif
    </section>

</div>


@endsection

@extends('app')

@section('header')
<x-header/>
@endsection

@section('content')
<div class='flex-grow flex-col flex items-center' >
    <div class="flex gap-4 p-4">
        
        <div class=" h-28 w-28">
            <!--user img-->
            <img src="/img/profile-picture.png" class="rounded-full objet-cover" alt="">
        </div>
        <!--user data-->
        <div>
            <div>
                <p class="font-semibold">{{$user->username}}</p>
            </div>

            <div>
                <span> posts</span>
                <span> follower</span>
                <span> following</span>
            </div>
            <div>
                <p>{{$user->name}}</p>
                <p>descripcion</p>
            </div>

        </div>

       
    </div>

    
    <section class="max-w-7xl">
        @if($posts->count())

        <h2>Publicaciones</h2>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5">
            @foreach($posts as $post)


            <a class="" href="/home">
            <figure class="rounded-lg relative max-w-sm w-72 h-72 overflow-hidden transition-all duration-300 cursor-pointer group">
                <div class="relative h-full">
                  <div class='bg-gradient-to-t from-black opacity-50 to-30% h-full w-full absolute z-10'></div>
                    <img class="rounded-lg object-cover h-full transform transition duration-300 ease-in-out group-hover:scale-110" src="{{asset('storage').'/uploads'.'/'.$user->id.'/'.$post->image}}" alt="image description">
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
            <p class="text-xl font-bold">No post to show</p>
        @endif
    </section>

</div>


@endsection

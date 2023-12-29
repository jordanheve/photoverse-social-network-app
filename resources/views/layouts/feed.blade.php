@extends('app')

@section('header')
<x-header/>
@endsection

@section('content')
<main class="flex flex-col items-center flex-grow py-4">
    <h2 class="text-3xl font-semibold text-center text-slate-800 mb-6">Home Page</h2>
   @forelse ($posts as  $post)
        <div class=" md:max-w-lg max-w-xs mx-4 ">
            <x-post-preview  :post="$post" />
           
        </div>
       

   @empty
        <p class="font-bold text-2xl text-slate-600 text-center">No posts to show follow someone</p>
   @endforelse

   <div class="mt-4">
    {{$posts->links('pagination::tailwind')}}
</div>

</main>


@endsection

@extends('app')

@section('header')
<x-header/>
@endsection

@section('content')
<div class="grid xl:grid-cols-5 grid-cols-3 mx-auto">

    @forelse ($posts as $post )
    <div class="lg:m-1 m-0.5 max-w-xs">
        <x-post-preview  :post="$post" />
    </div>
    @empty
    
    @endforelse
    
</div>
@endsection
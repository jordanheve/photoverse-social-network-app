@extends('app')

@section('header')
<x-header/>
@endsection

@section('content')
<div class=" flex justify-center items-center gap-10">
    
   
    <livewire:create-post/>
   
</div>


@endsection
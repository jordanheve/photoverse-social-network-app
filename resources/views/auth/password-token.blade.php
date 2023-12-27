@extends('app')

@section('header')
    <x-header/>
@endsection
@section('content')

<livewire:password-token-reset :token='$token' />

@endsection
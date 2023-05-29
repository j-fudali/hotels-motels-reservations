@extends('shared.layout')
@section('title', 'Welcome')
@section('content')
    @include('start.hero-unit')
    <div class="m-0 my-5 row justify-content-between align-items-stretch">
        @include('start/login')
        @include('start.sign-up')
    </div>
    @include('shared.footer')
@endsection

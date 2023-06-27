@extends('shared.layout')
@section('content')
    @include('shared.navbar')
    <div class="container-fluid">
        <div class="row" id="content">
            @yield('sidebar')
            @yield('dashboard-content')
        </div>
    </div>
    @include('shared.footer')
@endsection

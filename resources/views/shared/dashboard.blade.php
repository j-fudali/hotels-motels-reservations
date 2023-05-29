@extends('shared/layout')
@section('title', 'Strona główna')
@section('content')
    <div class="d-flex flex-column">
        @include('shared.navbar')
        <div class="container-fluid">
            <div class="row">
                @yield('sidebar')
                <div class="col-12 col-lg container-fluid min-vh-100 py-3 px-lg-4">
                    @yield('dashboard-content')
                </div>
            </div>
        </div>
        @include('shared.footer')
    </div>
@endsection

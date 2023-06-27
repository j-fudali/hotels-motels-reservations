@extends('shared.dashboard')
@section('title', 'Oferty')
@section('sidebar')
    @include('shared.search-bar')
@endsection
@section('dashboard-content')
    <div class="col-12 col-lg-9 ps-3 pb-3 row g-2 min-vh-100" id="container">
        @include('dashboard.offers.offers-results', ['rooms' => $rooms])
    </div>
@endsection

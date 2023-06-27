@extends('shared.dashboard')
@section('title', 'Moje rezerwacje')
@section('dashboard-content')
    <div id="container" class="row justify-content-center g-2 min-vh-100 pb-3 ps-3">
        @include('dashboard.reservations.reservations-results', ['reservations' => $reservations])
    </div>
@endsection

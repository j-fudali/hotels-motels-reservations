@extends('shared.dashboard')
@section('title', 'Rezerwacje gości')
@section('dashboard-content')
    <div id="container" class="row justify-content-center g-2 ps-3 pb-3 min-vh-100">
        @include('dashboard.guests-reservations.guests-reservations-results', [
            'reservations' => $reservations,
        ])
    </div>
@endsection

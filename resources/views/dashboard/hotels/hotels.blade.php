@extends('shared.dashboard')
@section('title', 'Moje hotele')
@section('dashboard-content')
    <div class="ps-3 py-3 min-vh-100">
        <div class="d-flex justify-content-end mb-2">
            <button type="button" data-bs-toggle="modal" data-bs-target="#addHotel"
                class="btn btn-primary d-flex align-items-center gap-1">Dodaj hotel<svg xmlns="http://www.w3.org/2000/svg"
                    width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                    <path
                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                </svg>
            </button>
        </div>
        <div id="container" class="row align-items-stretch g-2">
            @include('dashboard.hotels.hotels-results', ['hotels' => $hotels])
        </div>
    </div>
    @include('shared.modals.create-hotel-modal')
@endsection

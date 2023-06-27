@extends('shared.dashboard')
@section('title', 'Pokoje')
@section('dashboard-content')
    <div class="container-fluid min-vh-100 d-flex flex-column gap-2 ps-3 py-3">
        <div class="d-flex justify-content-between align-items-start">
            <a class="btn btn-secondary" href="{{ route('hotels.index') }}">Powrót</a>
            <a class="btn btn-primary align-self-end d-flex align-items-center gap-1" data-bs-toggle="modal"
                href="#createOfferModal">
                Stwórz oferte
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-plus-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                    <path
                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                </svg>
            </a>
        </div>
        <div id="container" class="row g-2">
            @include('dashboard.rooms.rooms-results', ['rooms' => $rooms])
        </div>
        @include('shared.modals.create-offer-modal')
    </div>
@endsection

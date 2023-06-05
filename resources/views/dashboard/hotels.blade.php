@extends('shared.dashboard')
@section('dashboard-content')
    <div class="container-fluid d-flex flex-column gap-2 p-0">
        <button type="button" data-bs-toggle="modal" data-bs-target="#addHotel"
            class="btn btn-primary align-self-end d-flex align-items-center gap-1">Dodaj hotel<svg
                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle"
                viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                <path
                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
            </svg>
        </button>
        <div class="row justify-content-start align-items-start g-2">
            @if (count($hotels) > 0)
                @foreach ($hotels as $hotel)
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card">
                            <div class="card-header row">
                                <div class="col-6">
                                    <h4 class="card-title">{{ $hotel->name }}</h4>
                                    <h6>
                                        {{ $hotel->address . ', ' . $hotel->postcode . ' ' . $hotel->city . ', ' . $hotel->province . ', ' . $hotel->country }}
                                    </h6>
                                </div>
                                <div class="col-6 d-flex flex-row gap-2 justify-content-end align-items-start">
                                    <a class="btn btn-primary" data-bs-toggle="modal" href="#updateHotel">
                                        Aktualizuj hotel
                                    </a>
                                    <form action="{{ route('hotels.destroy', $hotel) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Usuń</button>
                                    </form>
                                </div>
                            </div>
                            @if ($hotel->image)
                                <div class="col-7 align-self-center">
                                    <img src="{{ asset('storage/' . $hotel->image) }}" class="img-fluid"
                                        alt="{{ $hotel->name }}">

                                </div>
                            @endif
                            <div class="card-body">
                                <p class="card-text d-flex flex-column">
                                    {{ Str::substr($hotel->description, 0, 200) }}
                                    @if (Str::length($hotel->description) > 200)
                                        <span class="collapse" id="collapseExample">
                                            {{ Str::substr($hotel->description, 250) }}
                                        </span>
                                        <a class="btn btn-secondary align-self-end mt-2" data-bs-toggle="collapse"
                                            href="#collapseExample" role="button" aria-expanded="false"
                                            aria-controls="collapseExample">
                                            Więcej
                                        </a>
                                    @endif
                                </p>
                            </div>
                            <div class="card-footer d-flex flex-column">

                                <div class="d-flex justify-content-end gap-2">
                                    <a class="btn btn-primary" data-bs-toggle="modal" href="#createOfferModal">
                                        Stwórz oferte
                                    </a>
                                    <a class="btn btn-primary" href="{{ route('hotels.rooms.index', $hotel) }}">
                                        Przeglądaj pokoje
                                    </a>
                                </div>

                            </div>
                        </div>

                    </div>
                    @include('shared.modals.update-hotel-modal')
                    @include('shared.modals.create-offer-modal')
                @endforeach
            @else
                <h3 class="text-center">Brak hoteli. Dodaj nowy!</h3>
            @endif
        </div>
        @include('shared.modals.create-hotel-modal')
    </div>
@endsection

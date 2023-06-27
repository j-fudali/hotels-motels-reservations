@extends('shared.dashboard')
@section('title', 'Szczegóły')
@section('dashboard-content')
    <div class="row g-2 ps-3 pb-3" style="min-height: 85vh">
        <div class="col-12 col-md-6">
            <div class="h-100 card">
                <div class="card-header">
                    <h4 class="text-center">Opis pokoju</h4>

                </div>
                <div class="card-body d-flex flex-column gap-2">
                    @include('shared.carousel', [
                        'carousel_id' => 'carousel-room-' . $room->id_room,
                        'images' => $room->images()->get(),
                    ])
                    <h6><u>Liczba osób:</u> {{ $room->number_of_people }}</h6>
                    <h6><u>Koszt:</u> {{ $room->cost_per_day }} zł/dzień</h6>
                    <h6><u>Opis</u></h6>
                    <span>{{ $room->description }}</span>
                </div>

            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="h-100 card bg-dark-subtle">
                <div class="card-header">
                    <h4 class="text-center">Opis hotelu</h4>
                </div>
                <div class="card-body d-flex flex-column gap-lg-2">
                    <div class="row align-items-start">

                        <img style="height: 20rem" class="d-block img-fluid object-fit-cover col-12 col-md-8"
                            src="{{ asset('storage/' . $room->hotel->image) }}">
                        <div class="col12 col-md-4 text-lg-end">
                            <h6><u>Nazwa</u></h6>
                            <span>{{ $room->hotel->name }}</span>
                            <h6><u>Lokalizacja</u></h6>
                            <i>{{ $room->hotel->address }}, {{ $room->hotel->city }},
                                {{ $room->hotel->country->name }}</i>
                        </div>
                    </div>
                    <div>
                        <h6><u>Opis</u></h6>
                        <span>{{ $room->hotel->description }}</span>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

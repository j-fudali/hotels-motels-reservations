@extends('shared.dashboard')
@section('dashboard-content')
    <div class="container-fluid d-flex flex-column">
        @if (count($rooms) > 0)
            @foreach ($rooms as $room)
                <div class="col-4">
                    <div class="card">
                        <div class="card-header">
                            <div id="carouselExample" class="carousel slide">
                                <div class="carousel-inner">
                                    @foreach ($room->images()->get() as $image)
                                        <div class="carousel-item @if ($image == $room->images()->get()[0]) active @endif">
                                            <img src="{{ asset('storage/' . $image->path) }}" class="d-block w-100"
                                                alt="...">
                                        </div>
                                    @endforeach
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                                    data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                                    data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <h4>Liczba osób: {{ $room->number_of_people }}</h4>

                        </div>
                        <div class="card-footer">

                        </div>
                        </>
                    </div>
            @endforeach
        @else
            <div class="mt-5 d-flex flex-column align-items-center justify-content-center">
                <h3>Brak pokoi!</h3>
                <h5>Wróć i dodaj pokoje</h5>
                <a class="mt-5 btn btn-secondary" href="{{ route('hotels.index') }}">Powrót</a>
            </div>
        @endif
    </div>
@endsection

<div class="col-12 col-md-6 room">
    <div class="h-100 card">
        <div class="card-header">
            <div id="carousel-room-{{ $room->id_room }}" class="carousel slide">
                <div class="carousel-inner">
                    @foreach ($room->images()->get() as $image)
                        <div class="carousel-item @if ($image == $room->images()->get()[0]) active @endif">
                            <img style="width: 25rem;" src="{{ asset('storage/' . $image->path) }}" class="d-block mx-auto"
                                alt="...">
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button"
                    data-bs-target="#carousel-room-{{ $room->id_room }}" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button"
                    data-bs-target="#carousel-room-{{ $room->id_room }}" data-bs-slide="next">
                    <span class="fc-black carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="card-body d-flex flex-column justify-content-between">
            <div>
                <h5 class="card-title">{{ $room->hotel->name }}</h5>
                <h6>Pokój {{ $room->number_of_people }} osobowy - {{ $room->cost_per_day }} zł/dzień
                </h6>
                <p class="card-text">{{ Str::substr($room->description, 0, 200) }} @if (Str::length($room->description) > 200)
                        ...
                    @endif
                </p>
            </div>
            <h6 class="text-end"><i>{{ $room->hotel->address }}, {{ $room->hotel->city }},
                    {{ $room->hotel->province->name }},
                    {{ $room->hotel->country->name }}</i></h6>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <a class="btn btn-primary reserve-room" data-bs-toggle="modal"
                href="#reserveRoom-{{ $room->id_room }}">Rezerwuj
            </a>
            <a href="{{ route('offers.show', ['offer' => $room->id_room]) }}" class="btn btn-primary">Szczegóły</a>
        </div>
    </div>
</div>

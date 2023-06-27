<div class="col-12 col-md-6 col-lg-4">
    <div class="card h-100">
        <div class="card-header">
            <h5 class="text-end">Liczba wolnych: {{ $room->number_of_rooms }}</h5>
            @include('shared.carousel', [
                'carousel_id' => 'carousel-room-' . $room->id_room,
                'images' => $room->images()->get(),
            ])
        </div>
        <div class="card-body">
            <h5>Liczba osób: {{ $room->number_of_people }}</h5>
            <h6><u>Koszt za noc</u></h6>
            <span>{{ number_format($room->cost_per_day, 2, '.', ',') }} zł</span>
            <h6><u>Opis</u></h6>
            <p class="card-text d-flex flex-column">
                {{ Str::substr($room->description, 0, 200) }}
                @if (Str::length($room->description) > 200)
                    <span class="collapse" id="collapseExample-{{ $room->id_room }}">
                        {{ Str::substr($room->description, 250) }}
                    </span>
                    <a class="btn btn-secondary align-self-end mt-2" data-bs-toggle="collapse"
                        href="#collapseExample-{{ $room->id_room }}" role="button" aria-expanded="false"
                        aria-controls="collapseExample">
                        Więcej
                    </a>
                @endif
            </p>
        </div>
        <div class="card-footer d-flex flex-column">
            <div class="d-flex justify-content-end gap-2">
                <a class="btn btn-outline-secondary me-auto"
                    href="{{ route('offers.show', ['offer' => $room->id_room]) }}">
                    Podgląd
                </a>
                <a class="btn btn-primary" data-bs-toggle="modal" href="#updateOfferModal-{{ $room->id_room }}">
                    Aktualizuj
                </a>
                <form action="{{ route('rooms.destroy', $room) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button @if ($room->existInReservation()) disabled @endif type="submit"
                        class="btn btn-danger">Usuń</button>
                </form>
            </div>

        </div>
    </div>
</div>

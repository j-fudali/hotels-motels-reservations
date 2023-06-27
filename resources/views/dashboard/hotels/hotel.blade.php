<div class="col-12 col-md-6 col-lg-4">
    <div class="card h-100">
        <div class="card-header d-flex justify-content-between align-items-start">
            <div>
                <h5 class="card-title"><u>{{ $hotel->name }}</u></h5>
                <span><i>
                        {{ $hotel->address . ', ' . $hotel->city . ', ' . $hotel->province->name . ', ' . $hotel->country->name }}
                    </i>
                </span>
            </div>
            <form action="{{ route('hotels.destroy', $hotel) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"
                    @if (count($hotel->rooms()->get()) > 0) disabled @endif>Usuń</button>
            </form>
        </div>
        @if ($hotel->image)
            <img src="{{ asset('storage/' . $hotel->image) }}" style="height: 20rem"
                class="img-fluid object-fit-contain mx-auto p-2" alt="{{ $hotel->name }}">
        @endif
        <hr class="w-100 p-0 m-0">
        <div class="card-body">
            <h6><u>Opis</u></h6>
            <p class="card-text d-flex flex-column">
                {{ Str::substr($hotel->description, 0, 200) }}
                @if (Str::length($hotel->description) > 200)
                    <span class="collapse" id="collapseExample">
                        {{ Str::substr($hotel->description, 250) }}
                    </span>
                    <a class="btn btn-secondary align-self-end mt-2" data-bs-toggle="collapse" href="#collapseExample"
                        role="button" aria-expanded="false" aria-controls="collapseExample">
                        Więcej
                    </a>
                @endif
            </p>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <a class="btn btn-primary" data-bs-toggle="modal" href="#updateHotel-{{ $hotel->id_hotel }}">
                Aktualizuj
            </a>
            <div class="d-flex justify-content-end gap-2">
                <a class="btn btn-primary" href="{{ route('hotels.rooms.index', $hotel) }}">
                    Przeglądaj pokoje
                </a>
            </div>

        </div>
    </div>

</div>

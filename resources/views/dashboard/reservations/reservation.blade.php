<div class="col-12 col-md-10 col-lg-8">
    <div class="card">
        <div class="card-body row g-4">
            <div class="col-lg-4 col-md-6 col-12 d-flex justify-content-center">
                <img class="img-fluid object-fit-contain" style="width: 20rem"
                    src="{{ asset('storage/' . $reservation->room->hotel->image) }}">
            </div>
            <div class="col-lg-8 col-md-6 col-12 d-flex flex-column gap-2">
                <div>
                    <h5><u>Nazwa</u></h5>
                    <span class="text-primary fs-4">{{ $reservation->room->hotel->name }}</span>
                </div>
                <div class="d-flex justify-content-between">
                    <div>
                        <h6><u>Liczba osób</u></h6>
                        <span class="d-flex justify-content-between">Pokój
                            {{ $reservation->room->number_of_people }}
                            -osobowy
                        </span>
                    </div>
                    <div>
                        <h6><u>Koszt</u></h6>
                        <span class="text-primary">
                            {{ \Carbon\Carbon::parse($reservation->starting_date)->diffInDays(\Carbon\Carbon::parse($reservation->ending_date)) * $reservation->room->cost_per_day }}
                            zł za pobyt
                        </span>
                    </div>
                    <div>
                        <h6><u>Początek</u></h6>
                        <i>{{ $reservation->starting_date }}</i>
                    </div>
                    <div>
                        <h6><u>Koniec</u></h6>
                        <i>{{ $reservation->ending_date }}</i>
                    </div>
                </div>
                <div>
                    <h6><u>Opis</u></h6>
                    <p>
                        {{ \Illuminate\Support\Str::limit($reservation->room->description, 250, $end = '...') }}
                    </p>
                </div>
            </div>

        </div>
        <div class="card-footer d-flex justify-content-end gap-2">
            <a href="{{ route('offers.show', ['offer' => $reservation->room->id_room]) }}"
                class="btn btn-outline-secondary">Szczegóły</a>
            <form action="{{ route('reservations.destroy', ['reservation' => $reservation]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" @if ($reservation->starting_date < \Carbon\Carbon::now()) disabled @endif
                    class="col-auto btn btn-danger align-self-end">Anuluj</a>
            </form>
        </div>
    </div>
</div>

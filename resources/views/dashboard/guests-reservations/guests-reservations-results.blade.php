@if (count($reservations) > 0)
    @foreach ($reservations as $reservation)
        @include('dashboard.guests-reservations.guest-reservation', ['reservation' => $reservation])
    @endforeach
    <div class="d-flex d-sm-block justify-content-center align-self-end">
        {{ $reservations->links() }}
    </div>
@else
    <h3 class="text-center mt-5">Brak rezerwacji gości</h3>
@endif

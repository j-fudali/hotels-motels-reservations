@if (count($hotels) > 0)
    @foreach ($hotels as $hotel)
        @include('dashboard.hotels.hotel', ['hotel' => $hotel])
        @include('shared.modals.update-hotel-modal')
    @endforeach
    <div class="d-flex d-sm-block justify-content-center align-self-end">
        {{ $hotels->links() }}
    </div>
@else
    <h3 class="text-center">Brak hoteli. Dodaj nowy!</h3>
@endif

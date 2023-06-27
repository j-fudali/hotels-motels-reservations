@if (count($rooms) > 0)
    @foreach ($rooms as $room)
        @include('dashboard.rooms.room', ['room' => $room])
        @include('shared.modals.update-offer-modal')
    @endforeach
    <div class="d-flex d-sm-block justify-content-center align-self-end ">
        {{ $rooms->links() }}
    </div>
@else
    <div class="mt-5 d-flex flex-column align-items-center justify-content-center">
        <h3>Brak pokoi!</h3>
        <h5>Dodaj nowe pokoje</h5>
    </div>
@endif

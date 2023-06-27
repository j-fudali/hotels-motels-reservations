@if (count($rooms) > 0)
    @foreach ($rooms as $room)
        @include('dashboard.offers.offer', ['room' => $room])
        @include('shared.modals.reserve-room-modal')
    @endforeach
    <div class="d-flex d-sm-block justify-content-center align-self-end paginator">
        {{ $rooms->appends(request()->input())->links() }}
    </div>
@else
    <h3 class="text-center mt-5">Brak aktualnych ofert</h3>
@endif

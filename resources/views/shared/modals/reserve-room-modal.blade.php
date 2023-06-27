<div class="modal fade" id="reserveRoom-{{ $room->id_room }}" tabindex="-1" aria-labelledby="reserveRoom"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addHotel">Rezerwacja</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form id="reserve-room-{{ $room->id_room }}" method="POST"
                    action="{{ route('reservations.store', ['room_id_room' => $room->id_room]) }}">
                    @csrf
                    <div>
                        <label class="form-label" for="starting_date">Początek rezerwacji</label>
                        <input required class="form-control" id="starting_date" type="date" name="starting_date">

                    </div>
                    <div>
                        <label class="form-label" for="ending_date">Koniec rezerwacji</label>
                        <input disabled required class="form-control" id="ending_date" type="date"
                            name="ending_date">

                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zamknij</button>
                <button data-id="{{ $room->id_room }}" id="reserve-room-submit" type="submit"
                    class="btn btn-primary">Rezerwuj</button>
            </div>
            </form>
        </div>
    </div>
</div>

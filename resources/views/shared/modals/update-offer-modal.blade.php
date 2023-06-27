<div class="modal fade" id="updateOfferModal-{{ $room->id_room }}" tabindex="-1" aria-labelledby="updateOfferModal"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="updatedOfferModal">Aktualizuj oferte</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="update-offer-form-{{ $room->id_room }}" action="{{ route('rooms.update', $room) }}"
                    method="POST" enctype="multipart/form-data" class="d-flex flex-column gap-3">
                    @csrf
                    @method('PATCH')
                    <div>
                        <label for="number_of_people" class="form-label">Liczba osób</label>
                        <input disabled value="{{ $room->number_of_people }}" min="1" type="number"
                            name="number_of_people" id="number_of_people" class="form-control">
                    </div>
                    <div>
                        <label for="cost_per_day" class="form-label">Koszt za 1 dzień</label>
                        <input disabled value="{{ $room->cost_per_day }}" step="0.01" type="number"
                            name="cost_per_day" id="cost_per_day" class="form-control">
                    </div>
                    <div>
                        <label for="number_of_rooms" class="form-label">Liczba wolnych pokoi tego typu</label>
                        <input disabled value="{{ $room->number_of_rooms }}" min="1" type="number"
                            name="number_of_rooms" id="number_of_rooms" class="form-control">
                    </div>
                    <div>
                        <label for="formFile" class="form-label">Dodaj zdjęcia</label>
                        <input class="form-control" name="images[]" type="file" accept="image/*" id="formFile"
                            multiple>
                    </div>
                    <div>
                        <div class="form-floating">
                            <textarea required maxlength="500" name="description" class="form-control" placeholder="Opis..." id="floatingTextarea">{{ $room->description }}</textarea>
                            <label for="floatingTextarea">Opis</label>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zamknij</button>
                <button data-id="{{ $room->id_room }}" id="update-offer-form-submit" type="submit"
                    class="btn btn-primary">Aktualizuj</button>
            </div>
            </form>
        </div>
    </div>
</div>

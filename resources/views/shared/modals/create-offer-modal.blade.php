<div class="modal fade" id="createOfferModal" tabindex="-1" aria-labelledby="createOfferModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="createOfferModal">Stwórz oferte</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('hotels.rooms.store', $hotel) }}" method="POST" enctype="multipart/form-data"
                    class="d-flex flex-column gap-3">
                    @csrf
                    <div>
                        <label for="number_of_people" class="form-label">Liczba osób</label>
                        <input min="1" type="number" name="number_of_people" id="number_of_people"
                            class="form-control">
                    </div>
                    <div>
                        <label for="cost_per_day" class="form-label">Koszt za 1 dzień</label>
                        <input step="0.01" type="number" name="cost_per_day" id="cost_per_day" class="form-control">
                    </div>
                    <div>
                        <label for="formFile" class="form-label">Dodaj zdjęcia</label>
                        <input class="form-control" name="images[]" type="file" accept="image/*" id="formFile"
                            multiple>
                    </div>
                    <div>
                        <div class="form-floating">
                            <textarea name="description" class="form-control" placeholder="Opis..." id="floatingTextarea"></textarea>
                            <label for="floatingTextarea">Opis</label>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zamknij</button>
                <button type="submit" class="btn btn-primary">Stwórz</button>
            </div>
            </form>
        </div>
    </div>
</div>

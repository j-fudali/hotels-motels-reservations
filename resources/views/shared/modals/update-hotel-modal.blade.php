<div class="modal fade" id="updateHotel" tabindex="-1" aria-labelledby="updateHotel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="updateHotel">Aktualizuj hotel</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('hotels.update', $hotel) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body d-flex flex-column gap-2">
                    <div>
                        <label for="name" class="form-label">Nazwa hotelu</label>
                        <input type="text" id="name" name="name" class="form-control"
                            value="{{ $hotel->name }}">
                    </div>
                    <div>
                        <div class="form-floating">
                            <textarea maxlength="500" name="description" class="form-control h-auto" rows="8" placeholder="Opis..."
                                id="floatingTextarea">{{ $hotel->description }}</textarea>
                            <label for="floatingTextarea">Opis</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Wybierz zdjęcie</label>
                        <input class="form-control" name="image" type="file" accept="image/*" id="formFile">
                    </div>
                    <div class="d-flex flex-column gap-2">
                        <div class="row">
                            <div class="col-6">
                                <label for="country" class="form-label">Kraj</label>
                                <input disabled value="{{ $hotel->country }}" type="text" name="country"
                                    id="country" class="form-control">
                            </div>
                            <div class="col-6">
                                <label for="province" class="form-label">Województwo</label>
                                <input disabled value="{{ $hotel->province }}" type="text" name="province"
                                    id="province" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <label for="address" class="form-label">Adres</label>
                                <input disabled value="{{ $hotel->address }}" type="text" name="address"
                                    id="address" class="form-control">
                            </div>
                            <div class="col-4">
                                <label for="city" class="form-label">Miasto</label>
                                <input disabled type="text" name="city" id="city" class="form-control"
                                    value="{{ $hotel->city }}">
                            </div>
                            <div class="col-4">
                                <label for="postcode" class="form-label">Kod pocztowy</label>
                                <input disabled value="{{ $hotel->postcode }}" type="text" name="postcode"
                                    id="postcode" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zamknij</button>
                    <button type="sumbit" class="btn btn-primary">Aktualizuj</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="addHotel" tabindex="-1" aria-labelledby="addHotel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addHotel">Dodaj hotel</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('hotels.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body d-flex flex-column gap-2">
                    <div>
                        <label for="name" class="form-label">Nazwa hotelu</label>
                        <input type="text" id="name" name="name" class="form-control">
                    </div>
                    <div>
                        <div class="form-floating">
                            <textarea class="form-control" name="description" placeholder="Opis..." id="floatingTextarea"></textarea>
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
                                <input type="text" name="country" id="country" class="form-control">
                            </div>
                            <div class="col-6">
                                <label for="province" class="form-label">Województwo</label>
                                <input type="text" name="province" id="province" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <label for="address" class="form-label">Adres</label>
                                <input type="text" name="address" id="address" class="form-control">
                            </div>
                            <div class="col-4">
                                <label for="city" class="form-label">Miasto</label>
                                <input type="text" name="city" id="city" class="form-control">
                            </div>
                            <div class="col-4">
                                <label for="postcode" class="form-label">Kod pocztowy</label>
                                <input type="text" name="postcode" id="postcode" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zamknij</button>
                    <button type="sumbit" class="btn btn-primary">Stwórz</button>
                </div>
            </form>
        </div>
    </div>
</div>

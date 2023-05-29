<div class="col-12 col-lg-3 search-bar container-fluid p-3 d-flex flex-column">
    <h5>Szukaj</h5>
    <form action="/dashboard" method="GET" class="row justify-content-center gy-2-lg g-2">
        @csrf
        <div class="col-6 col-lg-12">
            <select class="form-select" aria-label="Kraj">
                <option selected>Kraj</option>
                <option value="1">Polska</option>
            </select>
        </div>
        <div class="col-6 col-lg-12">
            <select class="form-select" aria-label="Województwo">
                <option selected>Województwo</option>
                <option value="slaskie">Śląskie</option>
                <option value="dolnoslaskie">Dolnośląskie</option>
                <option value="malopolskie">Małopolskie</option>
                <option value="wielkopolskie">Wielkopolskie</option>
            </select>
        </div>
        <div class="col-12">
            <label for="search" class="form-label">Nazwa hotelu</label>
            <input type="text" id="search" class="form-control" placeholder="Wpisz nazwe...">
        </div>
        <button class="col-auto btn btn-primary">Szukaj</button>
    </form>
</div>

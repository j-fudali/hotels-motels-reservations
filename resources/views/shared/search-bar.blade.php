<div class="search-bar col-12 col-lg-2 p-3 d-flex flex-column">
    <h5>Szukaj</h5>
    <div class="container-fluid p-0">
        <form action="/dashboard" method="GET" class="row gy-2-lg g-2">
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
            <button class="btn btn-primary">Szukaj</button>
        </form>
    </div>
</div>

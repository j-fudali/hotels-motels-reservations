<div class="col-12 col-lg-3 search-bar p-3 d-flex flex-column">
    <h5>Szukaj</h5>
    <form action="{{ route('offers.index') }}" method="GET" id="filter-form"
        class="row justify-content-start gy-2-lg g-2">
        <div class="col-12 col-sm-4 col-md-4 col-lg-12">
            <label class="form-label" for="country">Kraj</label>
            <select id="country" name="country" class="form-select" aria-label="Kraj">
                <option value="" selected>Wybierz kraj</option>
                @foreach ($countries as $country)
                    <option value="{{ $country->id_countries }}">{{ $country->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-12 col-sm-4 col-md-4 col-lg-12">
            <label for="province" class="form-label">Województwo</label>
            <select id="province" name="province" class="form-select" aria-label="Województwo">
                <option value="" selected>Wybierz województwo</option>
                @foreach ($provinces as $province)
                    <option value="{{ $province->id_provinces }}">{{ $province->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-12 col-sm-4 col-md-4 col-lg-12">
            <label class="form-label" for="number_of_people">Liczba osób</label>
            <input type="number" class="form-control" name="number_of_people" id="number_of_people">
        </div>
        <div class="col-12">
            <label for="search" class="form-label">Nazwa hotelu</label>
            <input max="60" name="hotel_name" type="text" id="search" class="form-control"
                placeholder="Wpisz nazwe...">
        </div>
        <div class="mx-auto col-auto">
            <button id="filter-form-submit" type="submit" class="btn btn-primary ">Szukaj</button>
            <button id="filter-form-reset" type="reset" class="btn btn-secondary">Reset</button>

        </div>
    </form>
</div>

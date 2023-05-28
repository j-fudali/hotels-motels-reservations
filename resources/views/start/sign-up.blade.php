<div class="sign-up col-12 col-lg-6 p-5 p-0-lg d-flex flex-column justify-content-center align-items-center">
    <h2>Rejestracja</h2>
    <form method="POST" action="/register" class="row mb-3">
        @csrf
        <div class="col">
            <div class="mb-3 mx-3">
                <label class="form-label" for="firstname">Imię</label>
                <input class="form-control" type="text" name="first_name">
            </div>
            <div class="mb-3 mx-3">
                <label class="form-label" for="lastname">Nazwisko</label>
                <input class="form-control" type="text" name="last_name">
            </div>
            <div class="mb-3 mx-3">
                <label class="form-label" for="email">E-mail</label>
                <input class="form-control" type="email" name="email">
            </div>
            <div class="mb-3 mx-3">
                <label class="form-label" for="birth_date">Data urodzenia</label>
                <input class="form-control" type="date" name="birth_date">
            </div>
        </div>
        <div class="col">
            <div class="mb-3 mx-3">
                <label class="form-label" for="country">Kraj</label>
                <input class="form-control" type="text" name="country">
            </div>
            <div class="mb-3 mx-3">
                <label class="form-label" for="password">Hasło</label>
                <input class="form-control" type="password" name="password">
            </div>
            <div class="mb-3 mx-3">
                <span class="form-label d-block">Czy jesteś właścicielem hotelu?</span>
                <div class="btn-group" role="group" aria-label="Are you a hotel owner?">
                    <input class="btn-check" type="radio" autocomplete="off" id="btnradio1" name="is_hotel_owner"
                        value="1">
                    <label class="btn btn-primary" for="btnradio1">Tak</label>

                    <input class="btn-check" type="radio" autocomplete="off" id="btnradio2" checked
                        name="is_hotel_owner" value="0">
                    <label class="btn btn-primary" for="btnradio2">Nie</label>
                </div>
            </div>
        </div>
        <div class="col-12 d-flex justify-content-center">
            <input class="btn btn-primary" type="submit" value="Stwórz" />
        </div>
    </form>
    @if ($errors->all())
        @include('shared.errors', ['errors' => $errors->all()])
    @endif
</div>

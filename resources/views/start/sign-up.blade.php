<div class="sign-up col-12 col-lg-6 p-5 p-0-lg d-flex flex-column justify-content-center align-items-center">
    <h2>Rejestracja</h2>
    <form id="register-form" method="POST" action="/register" class="row mb-3">
        @csrf
        <div class="col">
            <div class="mb-3 mx-3">
                <label class="form-label" for="firstname">Imię</label>
                <input required class="form-control" id="firstname" type="text" name="first_name">
            </div>
            <div class="mb-3 mx-3">
                <label class="form-label" for="lastname">Nazwisko</label>
                <input required class="form-control" id="lastname" type="text" name="last_name">
            </div>
            <div class="mb-3 mx-3">
                <label class="form-label" for="email">E-mail</label>
                <input required class="form-control" id="email" type="email" name="email">
            </div>
            <div class="mb-3 mx-3">
                <label class="form-label" for="birth_date">Data urodzenia</label>
                <input required class="form-control" id="birth_date" type="date" name="birth_date">
            </div>
        </div>
        <div class="col">
            <div class=" mb-3 mx-3">
                <label class="form-label" for="country">Kraj</label>
                <select required id="country" name="country" class="form-select">
                    <option value="" selected>Wybierz kraj: </option>
                    @foreach ($countries as $country)
                        <option value="{{ $country->id_countries }}">{{ $country->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3 mx-3">
                <label class="form-label" for="password">Hasło</label>
                <input required class="form-control" id="password" type="password" name="password"
                    aria-labelledby="passwordHelpBlock">
                <div id="passwordHelpBlock" class="form-text">
                    Twoje hasło musi mieć min. 8 znaków w tym: 1 duża litera, 1 mała, 1 cyfra i 1 znak specjalny.
                </div>
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
            <input id="register-form-submit" class="btn btn-primary" type="submit" value="Stwórz" />
        </div>
    </form>
    @if ($errors->signup_form->all())
        @include('shared.errors', ['errors' => $errors->signup_form->all()])
    @endif
</div>

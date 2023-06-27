<div class="login col-12 col-lg-5 p-5 p-0-lg mb-3 mb-lg-0 d-flex flex-column justify-content-center align-items-center">
    <h2>Logowanie</h2>
    <form id="login-form" action="/login" method="POST" class="mb-3">
        @csrf
        <div class="mb-3 mx-3">
            <label class="form-label" for="login-email">E-mail</label>
            <input required class="form-control" id="login-email" type="email" name="email">
        </div>
        <div class="mb-3 mx-3">
            <label class="form-label" for="login-password">Hasło</label>
            <input required class="form-control" id="login-password" type="password" name="password">
        </div>
        <div class="col-12 d-flex justify-content-center">
            <input id="login-form-submit" class="btn btn-primary" type="submit" value="Zaloguj" />
        </div>
    </form>
    {{-- @if ($errors->login_form->all())
        @include('shared.errors', ['errors' => $errors->login_form->all()])
    @endif --}}
</div>

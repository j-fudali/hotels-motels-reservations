<div class="login col-12 col-lg-5 p-5 p-0-lg mb-3 mb-lg-0 d-flex flex-column justify-content-center align-items-center">
    <h2>Logowanie</h2>
    <form action="/login" method="POST">
        @csrf
        <div class="mb-3 mx-3">
            <label class="form-label" for="email">E-mail</label>
            <input class="form-control" type="login-email" name="email">
        </div>
        <div class="mb-3 mx-3">
            <label class="form-label" for="password">Hasło</label>
            <input class="form-control" type="login-password" name="password">
        </div>
        <div class="col-12 d-flex justify-content-center">
            <input class="btn btn-primary" type="submit" value="Zaloguj" />
        </div>
    </form>
    @if ($errors->first('login-password'))
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>

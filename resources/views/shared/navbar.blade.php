<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid px-3">
        <div class="d-flex align-items-center">
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand fs-3" href="{{ route('offers.index') }}">Hotels & Motels</a>
        </div>
        <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasNavbar"
            aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                <div class="d-flex d-lg-none gap-3 justify-content-end align-items-center">
                    <span>Witaj, {{ $user->first_name }}</span>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger">Wyloguj</button>
                    </form>
                </div>
            </div>
            <div class="offcanvas-body d-flex flex-column flex-lg-row justify-content-between">
                <div class="navbar-nav">
                    <a class="nav-link" href="{{ route('reservations.index') }}">Moje rezerwacje</a>
                    @if ($user->is_hotel_owner)
                        <a class="nav-link" href="{{ route('hotels.index') }}">Moje hotele</a>
                        <a class="nav-link" href="{{ route('guests-reservations.index') }}">Rezerwacje gości</a>
                    @endif
                    <a class="nav-link" href="{{ route('profile.index') }}">Profil</a>
                </div>
                <div class="d-none d-lg-flex gap-3 justify-content-end align-items-center">
                    <span>Witaj, {{ $user->first_name }}</span>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger">Wyloguj</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</nav>

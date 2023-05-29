<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid px-3">
        <div class="d-flex align-items-center">
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand fs-3" href="{{ route('dashboard') }}">H&M Reservations</a>
        </div>
        <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasNavbar"
            aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body d-flex flex-column flex-lg-row justify-content-between">
                <div class="navbar-nav">
                    <a class="nav-link" href="{{ route('dashboard.reservations') }}">Moje rezerwacje</a>
                    @if ($user->is_hotel_owner)
                        <a class="nav-link" href="{{ route('dashboard.profile') }}">Moje hotele</a>
                    @endif
                    <a class="nav-link" href="{{ route('dashboard.profile') }}">Profil</a>
                </div>
                <div class="d-flex flex-column flex-lg-row gap-3 align-items-stretch align-items-lg-center">
                    <span>Witaj, {{ $user->first_name }}</span>
                    <a href="#" class="btn btn-outline-primary">Stwórz oferte</a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger">Wyloguj</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</nav>

@extends('shared.dashboard')
@section('dashboard-content')
    <div class="container-fluid col col-md-8 col-lg-4">
        <div class="card">
            <div class="card-body d-flex flex-column">
                <h4 class="card-title">{{ $user->first_name }} {{ $user->last_name }}</h4>
                <form method="post" action="#" class="d-flex flex-column gap-2">
                    <div>
                        <label for="email" class="form-label">E-mail</label>
                        <input type="text" id="email" class="form-control" value="{{ $user->email }}" disabled>
                    </div>
                    <div>
                        <label for="country" class="form-label">Kraj</label>
                        <input type="text" id="country" class="form-control" value="{{ $user->country }}" disabled>
                    </div>
                    <div>
                        <label for="birth-date" class="form-label">Data urodzenia</label>
                        <input type="date" id="bith-date" class="form-control" value="{{ $user->birth_date }}">
                    </div>
                    <small class="align-self-end">Data założenia:
                        <i>{{ $user->created_at }}</i>
                    </small>
                    <a href="#" class="btn btn-primary align-self-stretch">Aktualizuj</a>
                </form>
            </div>
        </div>
    </div>
@endsection

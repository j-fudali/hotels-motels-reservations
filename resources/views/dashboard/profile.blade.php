@extends('shared.dashboard')
@section('title', 'Mój profil')
@section('dashboard-content')
    <div class="container-fluid col col-md-8 col-lg-4 min-vh-100 pt-3">
        <div class="card">
            <div class="card-body d-flex flex-column">
                <h4 class="card-title">{{ $user->first_name }} {{ $user->last_name }}</h4>
                <form id="update-profile-form" method="POST"
                    action="{{ route('profile.update', ['profile' => $user->id_user]) }}" class="d-flex flex-column gap-2">
                    @csrf
                    @method('PATCH')
                    <div>
                        <label for="email" class="form-label">E-mail</label>
                        <input type="text" id="email" class="form-control" value="{{ $user->email }}" disabled>
                    </div>
                    <div>
                        <label for="country" class="form-label">Kraj</label>
                        <select disabled id="country" name="country" class="form-select">
                            @foreach ($countries as $country)
                                <option @if ($user->country->id_countries == $country->id_countries) selected @endif
                                    value="{{ $country->id_countries }}">{{ $country->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="birth_date" class="form-label">Data urodzenia</label>
                        <input type="date" id="birth_date" name="birth_date" class="form-control"
                            value="{{ $user->birth_date }}">
                    </div>
                    <small class="align-self-end">Data założenia:
                        <i>{{ $user->created_at }}</i>
                    </small>
                    <button type="submit" class="btn btn-primary align-self-stretch">Aktualizuj</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@extends('shared.dashboard')
@section('dashboard-content')
    <div class="container w-25">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $user->first_name }} {{ $user->last_name }}</h5>
                <h6>Data urodzenia: <i>{{ $user->birth_date }}</i></h6>
                <h6>E-mail: <i>{{ $user->email }}</i></h6>
                <h6>Data założenia: <i>{{ $user->password }}</i></h6>
                <a href="#" class="btn btn-primary">Aktualizuj</a>
            </div>
        </div>
    </div>
@endsection

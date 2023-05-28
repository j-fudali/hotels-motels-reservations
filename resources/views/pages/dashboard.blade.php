@extends('shared/layout')
@section('title', 'Strona główna')
@section('content')
    <div class="d-flex flex-column">
        @include('shared.navbar')
        <div class="container-fluid">
            <div class="row">
                @include('shared.search-bar')
                @include('dashboard.rooms-list')
            </div>
        </div>
        @include('shared.footer')
    </div>
@endsection

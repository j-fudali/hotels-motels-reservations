<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>@yield('title')</title>
</head>

<body>
    <div id="spinner"
        class="d-none position-fixed w-100 h-100 d-flex justify-content-center align-items-center bg-secondary"
        style="--bs-bg-opacity: .5; z-index: 2000">
        <div class="spinner-border" style="width: 6rem; height: 6rem;" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
    @yield('content')
    @if ($errors->any())
        <div class="global-alert alert alert-danger alert-dissmisable position-fixed bottom-0 start-50 translate-middle"
            role="alert">
            {{ $errors->first() }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session()->has('messages'))
        <div class="global-alert alert alert-success position-fixed alert-dissmisable bottom-0 start-50 translate-middle"
            role="alert">
            {{ session('messages') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>

</body>

</html>

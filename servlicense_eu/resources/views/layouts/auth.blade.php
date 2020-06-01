<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <meta name="description" content="Dashmix - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

    <!-- Open Graph Meta -->
    <meta property="og:title" content="Dashmix - Bootstrap 4 Admin Template &amp; UI Framework">
    <meta property="og:site_name" content="Dashmix">
    <meta property="og:description" content="Dashmix - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{ asset('media/favicons/favicon.png') }}">
    <link rel="icon" sizes="192x192" type="image/png" href="{{ asset('media/favicons/favicon-192x192.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('media/favicons/apple-touch-icon-180x180.png') }}">

    <link rel="stylesheet" id="css-main" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700">
    <link rel="stylesheet" id="css-theme" href="{{ asset('css/dashmix.css') }}">
    <link rel="stylesheet" id="css-theme" href="{{ asset('css/iziToast.css') }}">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>window.Laravel = {!! json_encode(['csrfToken' => csrf_token(),]) !!};</script>

</head>
<body>
<!-- Page Container -->
<div id="page-container">

    <!-- Main Container -->
    <main id="main-container">
        @yield('content')
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script src="{{ mix('js/dashmix.app.js') }}"></script>
<script src="{{ mix('js/laravel.app.js') }}"></script>
<script src="{{ asset('css/iziToast.min.js') }}"></script>

@if (count($errors) > 0)
    <script>
        iziToast.error({
            type: 'error',
            title: 'Fehler',
            message: '@foreach ($errors->all() as $error) {{ $error }} @endforeach'
        });
    </script>
@endif

@if (\Illuminate\Support\Facades\Session::has('success'))
    <script>
        iziToast.success({
            title: 'Erfolgreich',
            message: '{!! \Illuminate\Support\Facades\Session::get('success') !!}'
        });
    </script>
@endif

</body>
</html>

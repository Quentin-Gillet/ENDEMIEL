<!DOCTYPE html>
<html lang="fr">
<head>

    <meta charset="UTF-8">
    <title>Endemiel</title>
    @section("extra-css")
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('css/marker-indicators.css') }}" rel="stylesheet">
    @show
    @section('extra-js')
        <script type="text/javascript" src="{{ asset('js/master.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/navbar-script.js') }}"></script>
    @show
    @section('extra-meta')
        <meta name="csrf-token" content="{{ csrf_token() }}">
    @show

    <!--    lien vers les différentes font google-->

    <link href="https://fonts.googleapis.com/css2?family=Syne+Mono&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Syne+Mono&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/4c22a0d41e.js" crossorigin="anonymous"></script>

</head>
<body>
    @include('layouts.navbar')

    @yield('head-body-section')

    @yield('content-wrapper')

    @yield('extra-script')
</body>
</html>

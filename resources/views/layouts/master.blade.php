<!DOCTYPE html>
<html lang="fr">
<head>

    <meta charset="UTF-8">
    <title>Endemiel - @yield('page_title')</title>
    @section("extra-css")
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    @show
    @section('extra-js')
        <script type="text/javascript" src="{{ asset('js/navbar-script.js') }}"></script>
    @show

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--    lien vers les différentes font google-->
    <script src="https://kit.fontawesome.com/4c22a0d41e.js" crossorigin="anonymous"></script>

</head>
<body>
@include('layouts.navbar')

@yield('content')

@include('layouts.footer')

@yield('extra-script')
@yield('extra')
</body>
</html>

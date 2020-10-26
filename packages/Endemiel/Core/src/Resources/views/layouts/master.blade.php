<!DOCTYPE html>
<html lang="fr">
<head>

    <meta charset="UTF-8">
    <title>title</title>
    <link href="{{ asset('vendor/courier/css/style.css') }}" rel="stylesheet">
    @yield("extra-css")
    @yield("extra-js")

    <!--    lien vers les différentes font google-->

    <link href="https://fonts.googleapis.com/css2?family=Syne+Mono&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Syne+Mono&display=swap" rel="stylesheet">

</head>
<body>
    @include('core::layouts.navbar')
    @yield('main')
</body>
</html>

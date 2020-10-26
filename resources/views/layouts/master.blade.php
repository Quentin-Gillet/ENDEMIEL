<!DOCTYPE html>
<html lang="fr">
<head>

    <meta charset="UTF-8">
    <title>title</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    @yield("extra-css")
    @yield("extra-js")

    <!--    lien vers les différentes font google-->

    <link href="https://fonts.googleapis.com/css2?family=Syne+Mono&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Syne+Mono&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/4c22a0d41e.js" crossorigin="anonymous"></script>

</head>
<body>
    @include('layouts.navbar')
    @yield('content-wrapper')
</body>
</html>

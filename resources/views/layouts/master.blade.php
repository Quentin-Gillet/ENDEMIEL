<!DOCTYPE html>
<html lang="fr">
<head>

    <meta charset="UTF-8">
    <title>title</title>
    @section("extra-css")
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    @show
    @section('extra-js')
        <script type="text/javascript" src="{{ asset('js/navbar-script.js') }}"></script>
    @show

    <!--    lien vers les différentes font google-->

    <link href="https://fonts.googleapis.com/css2?family=Syne+Mono&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Syne+Mono&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/4c22a0d41e.js" crossorigin="anonymous"></script>

</head>
<body>
    @include('layouts.navbar')

    @if (session('status'))
        {{--    En dessous faut que y'ai un bandeau vert qui apparait    --}}
        <div class="">
            {{ session('status') }}
        </div>
    @endif

    @if($errors)
        {{--    En dessous faut que y'ai un bandeau rouge qui apparait    --}}
        <div class="">
            {{ $errors }}
        </div>
    @endif

    @yield('content-wrapper')
</body>
</html>

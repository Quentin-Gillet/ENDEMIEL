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
        <script type="text/javascript" src="{{ asset('js/navbar-script.js') }}"></script>
    @show

    <!--    lien vers les différentes font google-->

    <link href="https://fonts.googleapis.com/css2?family=Syne+Mono&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Syne+Mono&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/4c22a0d41e.js" crossorigin="anonymous"></script>

</head>
<body>
    @include('layouts.navbar')

    @include('components.marker-indicators')


    @yield('content-wrapper')

    @yield('extra-script')

    <script>
        var i = 0;
        var background = [

            "url('{{ asset('images/back.jpg') }}')" ,
            "url('{{ asset('images/back2.jpg') }}')" ,
            "url('{{ asset('images/back3.jpg') }}')"

        ];
        var time = 6000;

        function changeBackground() {
            document.querySelector("body").style.backgroundImage = background[i];
            if(i < background.length - 1){
                i++;
            } else {
                i = 0;
            }
            setTimeout("changeBackground()", time);
        }

        window.onload = changeBackground;

    </script>

</body>
</html>

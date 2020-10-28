<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Se connecter</title>
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
</head>
<body>
    @if($errors->any())
        <div>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </div>
    @endif
    <section>
        <div class="main_container">
            <div class="container_left">
                <h2 class="title_login">Titre/logo</h2>
                <form action="{{ route('login') }}" method="POST" class="form">
                    @csrf
                    <div class="subcontainer_login">
                        <input type="email" class="input" placeholder="E-mail" name="email"><br>
                        <input type="password" class="input" placeholder="Mot de passe" name="password"><br>
                        <button class="button" type="submit">Se connecter</button>
                    </div>
                </form>
            </div>
            <div class="container_right">
                <h2 class="title_account">Tu n'as pas de compte ?</h2>
                <br>
                <a class="button" href="{{ route('register') }}">S'enregistrer</a>
            </div>
        </div>
    </section>
</body>
</html>


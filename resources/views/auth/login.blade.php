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
        <div class="container">
            <h1 class="title">Se connecter</h1>
            <form class="form">
                <input class="input" type="email" placeholder="&#xf1fa   Email">
                <input class="input" type="password" placeholder="&#xf084   Mot de passe">
                <label class="checkbox"><input class="check" type="checkbox"> Se souvenir de moi</label><br>
                <input class="submit" type="submit" value="Se connecter">
                <input class="submit2" type="submit" value="S'enregistrer">
            </form>
        </div>
    </section>
</body>
</html>


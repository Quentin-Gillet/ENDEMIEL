{{--@extends('layouts.master')--}}
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="{{ asset('css/register.css') }}" rel="stylesheet">
</head>
<body>
<section>
    <div class="main_register">
        <div class="register_left">
                <h2 class="title_register">Titre/logo</h2>
                <form action="{{ route('register') }}" method="POST" class="form">
                    @csrf
                    <div class="subregister_login">
                        <input type="text" class="input" placeholder="pseudo"><br>
                        <input type="email" class="input" placeholder="email"><br>
                        <input type="password" class="input" placeholder="mot de passe"><br>
                        <input type="password" class="input" placeholder="confirmer le mot de passe"><br>
                        <button class="button" type="button">S'enregistrer</button>
                    </div>
                </form>
        </div>
        <div class="register_right">
             <h2 class="title_account">Tu as déjà un compte</h2>
             <button class="button">Se connecter</button>
        </div>
    </div>
</section>
</body>
</html>

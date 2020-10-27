{{--@extends('layouts.master')--}}

@section("extra-css")
    @parent
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
@endsection

<section>
    <div class="main_container">
        <div class="container_left">
                <h2 class="title_login">Titre/logo</h2>
                <form action="{{ route('login') }}" method="POST" class="form">
                    @csrf
                    <div class="subcontainer_login">
                        <input type="email" class="input" placeholder="email"><br>
                        <input type="password" class="input" placeholder="mot de passe"><br>
                        <button class="button" type="button">Se connecter</button>
                    </div>
                </form>
        </div>
        <div class="container_right">
             <h2 class="title_account">Tu n'as pas de compte</h2>
             <button class="button">S'enregister</button>
        </div>
    </div>
</section>

@extends('layouts.master')
@section('page_title', 'Se connecter')

@section('content')
    @if($errors->any())
        <div>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </div>
    @endif
    <div class="loginContainer">
        <h1 class="loginTitle">Se connecter</h1>
        <form class="loginForm">
            <input class="input" type="email" placeholder="&#xf1fa   Email">
            <input class="input" type="password" placeholder="&#xf084   Mot de passe">
            <label class="checkbox"><input class="check" type="checkbox"> Se souvenir de moi</label><br>
            <input class="submit" type="submit" value="Se connecter">
            <input class="submit2" type="submit" value="S'enregistrer">
        </form>
    </div>
@endsection

@section('extra-css')
    @parent
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
@endsection


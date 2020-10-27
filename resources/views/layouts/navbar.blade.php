@section("extra-js")
    <script type="text/javascript" src="{{ asset('js/js.js') }}"></script>
@endsection
<header>
        <div class="menu">
            <div class="inner">
                <div class="menu_right">
                    <ul class="menu_1">
                        <li class="lien">Nos sites</li>
                        <li class="lien">Aide</li>
                        <li class="lien">Contact</li>
                        <li class="lien" onclick="open_submenu()">Compte</li>
                            <ul class="submenu">
                                <button title="Fermer" class="button_quit" onclick="close_submenu()"><span class="icon_close"><i class="fas fa-times"></i></span></button>
                                <li class="lien2">Se connecter<span class="icon_login"><i class="fas fa-sign-in-alt"></i></span></li>
                                <li class="lien2">S'enregistrer<span class="icon_login"><i class="fas fa-user-plus"></i></span></li>
                            </ul>
                        <li class="lien_add">Ajouter un spot</li>
                    </ul>
                </div>
                <div class="menu_left">
                    <ul>
                        <li class="title">Logo/Titre</li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

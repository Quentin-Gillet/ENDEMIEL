<header>
    <div class="menu">
        <div class="inner">
            <div class="menu_right">
                <ul class="menu_1">
                    <a><li class="lien">Nos sites</li></a>
                    <a><li class="lien">Aide</li></a>
                    <a><li class="lien">Contact</li></a>
                    <a><li class="lien" onclick="open_submenu()">Compte</li></a>
                        <ul class="submenu">
                            <button title="Fermer" class="button_quit" onclick="close_submenu()"><span class="icon_close"><i class="fas fa-times"></i></span></button>
                            @guest
                                <a href="{{ route('login') }}"><li class="lien2">Se connecter<span class="icon_login"><i class="fas fa-sign-in-alt"></i></span></li></a>
                                <a href="{{ route('register') }}"><li class="lien2">S'enregistrer<span class="icon_login"><i class="fas fa-user-plus"></i></span></li></a>
                            @endguest
                            @auth
                                <a href="{{ route('user.account') }}"><li class="lien2">Mon espace<span class="icon_login"><i class="fas fa-user-circle"></i></span></li></a>
                                <form action="{{ route('logout') }}" method="POST" id="logout_form">
                                    @csrf
                                    <a onclick="document.getElementById('logout_form').submit();"><li class="lien2">Se déconnecter<span class="icon_login"><i class="fas fa-sign-out-alt"></i></span></li></a>
                                </form>
                            @endauth
                        </ul>
                    <a><li class="lien_add">Ajouter un spot</li></a>
                </ul>
            </div>
            <div class="menu_left">
                <ul>
                    <a href="{{ route('index') }}"><li class="title">Logo/Titre</li></a>
                </ul>
            </div>
        </div>
    </div>
</header>


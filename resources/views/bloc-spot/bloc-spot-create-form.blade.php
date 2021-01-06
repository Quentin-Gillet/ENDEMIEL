{{--
Lire les instructions ca commence et termine de la meme facon, le schema est le meme tous le temps
Type d'input:
 - text
 - file
 - textbox
 - select single
 - select multiple (style "multiselect.css" a part, regarder comment ca marche et ne pas modifier le nom des classes)
 --}}

@include('layouts.navbar')

<section class="block-content">
    <div class="block-content2">
        <h2 class="h2">Le spot</h2>
        <p class="p">Merci de décrire le plus précisément possible le spot d'escalade. </p>
        <form enctype="multipart/form-data" id="bloc-form">
            <div class="block1" id="block1"> {{--    Chaque partie est separé en block    --}}
                <span class="geolocal"><i
                        class="fas fa-map-marker-alt"></i> Géo-localisation :</span> {{--    Titre du block    --}}
                <div class="label1">
                    <label class="label"
                           for="site-name">{{ __('bloc-spot.bloc-form.site-name') }}</label> {{--    nom de l'input text    --}}
                    <input class="input" type="text" id="site-name"
                           placeholder="{{ __('bloc-spot.bloc-form.site-name') }}"> {{--   input text     --}}
                </div>
                <div class="label23">
                    <div
                        class="label">{{ __('bloc-spot.bloc-form.cliff-location') }}</div> {{--   Ici la map fait comme tu veux pour ca      --}}
                    <button class="map_button" id="">Ajouter</button> {{--   button     --}}
                </div>
                <div class="popup_map">
                        <span class="icon_close" title="Fermer"><i class="far fa-times-circle"></i></span>
                </div> {{-- popup_map --}}
                <div class="label2">
                    <label class="label"
                           for="recommended-site-for">{{ __('bloc-spot.bloc-form.recommended-site-for') }}</label> {{--   nom du select     --}}
                    <select name="recommended-site-for" id="recommended-site-for" class="multi"
                            multiple> {{--    Select multiple ATTENTION    --}}
                        {{--  Pour changer le style des select multiple modifier le fichier "multiselect.css"     --}}
                        <option value="">{{ __('bloc-spot.bloc-form.recommended-site-for') }}</option>
                        <option>Débutants</option>
                        <option>Amateurs</option>
                        <option>Confirmés</option>
                        <option>De haut niveau</option>
                    </select>
                </div>
                <div class="label3">
                    <label class="label" for="exposure">{{ __('bloc-spot.bloc-form.exposure') }}</label>
                    <select name="exposure" id="exposure" class="multi" multiple>
                        <option value="">{{ __('bloc-spot.bloc-form.exposure') }}</option>
                        <option value="">Toutes</option>
                        <option value="">N</option>
                        <option value="">NE</option>
                        <option value="">E</option>
                        <option value="">SE</option>
                        <option value="">S</option>
                        <option value="">SW</option>
                        <option value="">W</option>
                        <option value="">NW</option>
                    </select>
                </div>
                <div class="label4">
                    <label class="label" for="near-city">{{ __('bloc-spot.bloc-form.near-city') }}</label>
                    <input class="input" type="text" id="near-city">
                </div>
            </div>
            <hr>
            <div class="block2" id="block2"> {{--    Autre block    --}}
                <span class="approche"><i
                        class="fas fa-walking"></i> Marche d'approche :</span> {{--   Titre du block     --}}
                <div class="label5">
                    <label class="label" for="approach-method">{{ __('bloc-spot.bloc-form.approach-method') }}</label>
                    <select class="input" name="approach-method"
                            id="approach-method"> {{--   Select pas multiple style different     --}}
                        <option value="">En montée et descente raide</option>
                        <option value="">En montée et descente facile</option>
                        <option value="">En montée et descente</option>
                        <option value="">En bateau</option>
                        <option value="">En rappel</option>
                        <option value="">En montée facile</option>
                        <option value="">En montée raide</option>
                        <option value="">En montée</option>
                        <option value="">En descente facile</option>
                        <option value="">En descente raide</option>
                        <option value="">En descente</option>
                        <option value="">Sur du plat</option>
                    </select>
                </div>
                <div class="label6">
                    <label class="label" for="approach-time">{{ __('bloc-spot.bloc-form.approach-time') }}</label>
                    <input class="input" type="number" id="approach-time" min="0">
                </div>
            </div>
            <hr>
            <div class="block3" id="block3">
                <span class="alentours"><i class="fas fa-search-location"></i> Alentours</span>
                <div class="label7">
                    <label class="label" for="for-children">{{ __('bloc-spot.bloc-form.for-children') }}</label>
                    <select class="input" name="" id="for-children">
                        <option value="" selected>Détails non connus</option>
                        <option value="">Confortable</option>
                        <option value="">Correct</option>
                        <option value="">Accidenté</option>
                        <option value="">Dangereux</option>
                    </select>
                </div>
                <div class="label8">
                    <label class="label"
                           for="block-reception-quality">{{ __('bloc-spot.bloc-form.block-reception-quality') }}</label>
                    <select name="" id="block-reception-quality" class="multi" multiple>
                        <option value="">{{ __('bloc-spot.bloc-form.block-reception-quality') }}</option>
                        <option value="">Sol plat</option>
                        <option value="">Sol irrégulier ou en pente</option>
                        <option value="">Sol chaotique</option>
                    </select>
                </div>
            </div>
            <hr>
            <div class="block4" id="block4">
                <span class="apropos"><i class="fas fa-info"></i> A propos de l'escalade</span>
                <div class="label9">
                    <label class="label" for="climbing-type">{{ __('bloc-spot.bloc-form.climbing-type') }}</label>
                    <select class="input" name="" id="climbing-type">
                        <option value="" selected>Détails non connus</option>
                        <option value="">Bloc</option>
                        <option value="">Voies d'une longueur</option>
                        <option value="">Grande voie</option>
                        <option value="">Psycho bloc</option>
                        <option value="">Bloc en salle</option>
                        <option value="">Structure artificielle d'escalade</option>
                    </select>
                </div>
                <div class="label10">
                    <label class="label" for="equipment-type">{{ __('bloc-spot.bloc-form.equipment-type') }}</label>
                    <select class="input" name="" id="equipment-type">
                        <option value="" selected>Détails non connus</option>
                        <option value="">Sportif</option>
                        <option value="">Engagé</option>
                        <option value="">Terrain d'aventure</option>
                        <option value="">Moulinette</option>
                        <option value="">Aucun</option>
                    </select>
                </div>
                <div class="label11">
                    <label class="label" for="several-cliff">{{ __('bloc-spot.bloc-form.several-cliff') }}</label>
                    <input class="input" type="checkbox" id="several-cliff">
                </div>
                <br>
                <div class="label12">
                    <label class="label" for="max-height">{{ __('bloc-spot.bloc-form.max-height') }}</label>
                    <input class="input" type="number" id="max-height" step="0.01" min="0">
                </div>
                <div class="label13">
                    <label class="label" for="ways-number">{{ __('bloc-spot.bloc-form.ways-number') }}</label>
                    <select class="input" name="" id="ways-number">
                        <option value="" selected>Détails non connus</option>
                        <option value="">Moins de 25 voies</option>
                        <option value="">Entre 25 et 50 voies</option>
                        <option value="">Entre 50 et 100 voies</option>
                        <option value="">Entre 100 et 200 voies</option>
                        <option value="">Entre 200 et 300 voies</option>
                        <option value="">Entre 300 et 400 voies</option>
                        <option value="">Entre 400 et 500 voies</option>
                        <option value="">Entre 500 et 1000 voies</option>
                        <option value="">Plus de 1000 voies</option>
                    </select>
                </div>
                <br>
                <div class="label14">
                    <label class="label" for="quotation-min">{{ __('bloc-spot.bloc-form.quotation-min') }}</label>
                    <select class="input" name="" id="quotation-min">
                        @for($i = 3; $i <= 8; $i++)
                            <option value="">{{ $i }}a</option>
                            <option value="">{{ $i }}a+</option>
                            <option value="">{{ $i }}b</option>
                            <option value="">{{ $i }}b+</option>
                            <option value="">{{ $i }}c</option>
                            <option value="">{{ $i }}c+</option>
                        @endfor
                    </select>
                </div>
                <div class="label15">
                    <label class="label" for="quotation-max">{{ __('bloc-spot.bloc-form.quotation-max') }}</label>
                    <select class="input" name="" id="quotation-max">
                        @for($i = 3; $i <= 8; $i++)
                            <option value="">{{ $i }}a</option>
                            <option value="">{{ $i }}a+</option>
                            <option value="">{{ $i }}b</option>
                            <option value="">{{ $i }}b+</option>
                            <option value="">{{ $i }}c</option>
                            <option value="">{{ $i }}c+</option>
                        @endfor
                    </select>
                </div>
                <div class="label16">
                    <label class="label" for="rock">{{ __('bloc-spot.bloc-form.rock') }}</label>
                    <select id="rock" class="multi" multiple>
                        <option value="">Détails non connus</option>
                        <option value="">Dolerite</option>
                        <option value="">Serpentine</option>
                        <option value="">Porphyre</option>
                        <option value="">Grès armoricain</option>
                        <option value="">Andésite</option>
                        <option value="">Basalte</option>
                        <option value="">Calcaire</option>
                        <option value="">Conglomérat</option>
                        <option value="">Composite</option>
                        <option value="">Craie</option>
                        <option value="">Gabbro</option>
                        <option value="">Gneiss</option>
                        <option value="">Granite</option>
                        <option value="">Marbre</option>
                        <option value="">Migmatite</option>
                        <option value="">Quartz</option>
                        <option value="">Quartzite</option>
                        <option value="">Résine</option>
                        <option value="">Rhyolite</option>
                        <option value="">Roche volcanique</option>
                        <option value="">Schiste</option>
                        <option value="">Trachyte</option>
                        <option value="">Tuf</option>
                        <option value="">Autre</option>
                    </select>
                </div>
                <div class="label17">
                    <label class="label" for="profile">{{ __('bloc-spot.bloc-form.profile') }}</label>
                    <select name="" id="profile" class="multi" multiple>
                        <option value="">{{ __('bloc-spot.bloc-form.profile') }}</option>
                        <option value="">Dalle</option>
                        <option value="">Dévers</option>
                        <option value="">Dièdre</option>
                        <option value="">Surplomb</option>
                        <option value="">Vertical</option>
                    </select>
                </div>
                <div class="label18">
                    <label class="label" for="sockets-types">{{ __('bloc-spot.bloc-form.sockets-types') }}</label>
                    <select name="" id="sockets-types" class="multi" multiple>
                        <option value="">{{ __('bloc-spot.bloc-form.sockets-types') }}</option>
                        <option value="">Aplats</option>
                        <option value="">Cannelures</option>
                        <option value="">Colonnettes</option>
                        <option value="">Concrétions</option>
                        <option value="">Fissure</option>
                        <option value="">Galets</option>
                        <option value="">Gouttes d'eau</option>
                        <option value="">Réglettes</option>
                        <option value="">Trous</option>
                        <option value="">Grosses prises</option>
                        <option value="">Inversées</option>
                        <option value="">Verticales</option>
                        <option value="">Tafonis</option>
                    </select>
                </div>
                <div class="label19">
                    <label class="labelexep" for="restriction">{{ __('bloc-spot.bloc-form.restrictions') }}</label>
                    <textarea class="input2" name="" id="restriction" cols="30" rows="5"></textarea>
                </div>
                <div class="label20">
                    <label class="labelexep"
                           for="miscellaneous-informations">{{ __('bloc-spot.bloc-form.miscellaneous-informations') }}</label>
                    <textarea class="input2" name="" id="miscellaneous-informations" cols="30" rows="5"></textarea>
                </div>
            </div>
            <hr>
            <div class="block5" id="block5">
                <span class="apropos"><i class="fas fa-plus"></i> Détails</span>
                <div class="label21">
                    <label class="label" for="image-upload">{{ __('bloc-spot.bloc-form.image-upload') }}</label>
                    <label class="button_upload">Choisir un fichier
                        <input class="file" type="file" id="image-upload">
                    </label>
                </div>
                <div class="label22">
                    <label class="label" for="file-upload">{{ __('bloc-spot.bloc-form.file-upload') }}</label>
                    <label class="button_upload">Choisir un fichier
                        <input class="file" type="file" id="image-upload">
                    </label>
                </div>
            </div>
            <button class="submit" type="submit"><span class="label-submit">Envoyer</span></button>
        </form>
    </div>
    @include('layouts.footer')
</section>

<script type="text/javascript"
        src="{{ asset('vendor/jildertmiedema/laravel-plupload/js/plupload.full.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bloc-form.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/multiselect.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/navbar-script.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/popup_map.js') }}"></script>
<script src="https://kit.fontawesome.com/4c22a0d41e.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="{{ asset('css/multiselect.css') }}">
<link rel="stylesheet" href="{{ asset('css/bloc-spot-create-form.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

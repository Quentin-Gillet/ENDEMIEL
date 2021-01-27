@extends('layouts.master')
@section('page_title', 'add a spot')

@section('content')
        <div class="block-content2">
            <div class="animationProgress"></div>
            <h2 class="h2">Le spot</h2>
            <p class="p">Merci de décrire le plus précisément possible le spot d'escalade. </p>
            <form method="POST" enctype="multipart/form-data" id="bloc-form" action="{{ route('bloc-spot.store') }}">
                @csrf
                @method("post")
                <div class="block1" id="block1">
                <span class="geolocal"><i
                        class="fas fa-map-marker-alt"></i> Géo-localisation :</span>
                    <div class="label1">
                        <label class="label" for="site-name">{{ __('bloc-spot.bloc-form.site-name') }}</label>
                        <input name="site-name" class="input" type="text" id="site-name" placeholder="{{ __('bloc-spot.bloc-form.site-name') }}">
                    </div>
                    <div class="label2">
                        <label class="label" for="recommended-site-for">{{ __('bloc-spot.bloc-form.recommended-site-for') }}</label>
                        <select name="recommended-site-for[]" id="recommended-site-for" multiple size="1">
                            <option value="beginner">Débutants</option>
                            <option value="amateur">Amateurs</option>
                            <option value="confirmed">Confirmés</option>
                            <option value="high_level">De haut niveau</option>
                        </select>
                    </div>
                    <div class="label3">
                        <label class="label" for="exposure">{{ __('bloc-spot.bloc-form.exposure') }}</label>
                        <select name="exposure[]" id="exposure" multiple size="1">
                            <option value="north">N</option>
                        <option value="east-north">NE</option>
                        <option value="east">E</option>
                        <option value="east-south">SE</option>
                        <option value="south">S</option>
                        <option value="west-south">SW</option>
                        <option value="west">W</option>
                        <option value="west-north">NW</option>
                        </select>
                    </div>
                    <div class="label4">
                        <label class="label" for="near-city">{{ __('bloc-spot.bloc-form.near-city') }}</label>
                        <input class="input" name="near-city" type="text" id="near-city" placeholder="{{ __('bloc-spot.bloc-form.near-city') }}">
                    </div>
                    <div class="label23">
                        <div class="label">{{ __('bloc-spot.bloc-form.cliff-location') }} :</div> {{--   juste le label      --}}
                    </div>
                    {{--   Ici la map fait comme tu veux pour ca      --}}
                    <div class="label24">
                        <div class="iframe_map" id="gmap_canvas"></div>
                    </div>
                </div>
                <hr>
                <div class="block2" id="block2">
                    <span class="approche"><i class="fas fa-walking"></i> Marche d'approche :</span>

                    <div class="label5">
                        <label class="label" for="approach-method">{{ __('bloc-spot.bloc-form.approach-method') }}</label>
                        <select class="input" name="approach-method" id="approach-method">
                            <option value="1">En montée et descente raide</option>
                            <option value="2">En montée et descente facile</option>
                        <option value="3">En montée et descente</option>
                        <option value="4">En bateau</option>
                        <option value="5">En rappel</option>
                        <option value="6">En montée facile</option>
                        <option value="7">En montée raide</option>
                        <option value="">En montée</option>
                        <option value="8">En descente facile</option>
                        <option value="9">En descente raide</option>
                        <option value="10">En descente</option>
                        <option value="11">Sur du plat</option>
                    </select>
                </div>
                <div class="label6">
                    <label class="label" for="approach-time">{{ __('bloc-spot.bloc-form.approach-time') }}</label>
                    <input class="input" name="approach-time" type="number" value="0" id="approach-time" min="0">
                </div>
            </div>
            <hr>
            <div class="block3" id="block3">
                <span class="alentours"><i class="fas fa-search-location"></i> Alentours</span>

                <div class="label7">
                    <label class="label" for="for-children">{{ __('bloc-spot.bloc-form.for-children') }}</label>
                    <select class="input" name="for-children" id="for-children">
                        <option value="unknown" selected>Détails non connus</option>
                        <option value="comfortable">Confortable</option>
                        <option value="correct">Correcte</option>
                        <option value="accident">Accidenté</option>
                        <option value="dangerous">Dangereux</option>
                    </select>
                </div>
                <div class="label8">
                    <label class="label" for="block-reception-quality">{{ __('bloc-spot.bloc-form.block-reception-quality') }}</label>
                    <select name="block-reception-quality[]" id="block-reception-quality" multiple size="1">
                        <option value="ground">Sol plat</option>
                        <option value="slope">Sol irrégulier ou en pente</option>
                        <option value="chaotic">Sol chaotique</option>
                    </select>
                </div>
            </div>
            <hr>
            <div class="block4" id="block4">
                <span class="apropos"><i class="fas fa-info"></i> A propos de l'escalade</span>

                <div class="label9">
                    <label class="label" for="climbing-type">{{ __('bloc-spot.bloc-form.climbing-type') }}</label>
                    <select class="input" name="climbing-type" id="climbing-type">
                        <option value="unknown" selected>Détails non connus</option>
                        <option value="block">Bloc</option>
                        <option value="length">Voies d'une longueur</option>
                        <option value="big_way">Grande voie</option>
                        <option value="psycho_block">Psycho bloc</option>
                        <option value="hall">Bloc en salle</option>
                        <option value="artificial">Structure artificielle d'escalade</option>
                    </select>
                </div>
                <div class="label10">
                    <label class="label" for="equipment-type">{{ __('bloc-spot.bloc-form.equipment-type') }}</label>
                    <select class="input" name="equipment-type" id="equipment-type">
                        <option value="unknown" selected>Détails non connus</option>
                        <option value="athletic">Sportif</option>
                        <option value="engaged">Engagé</option>
                        <option value="adventure">Terrain d'aventure</option>
                        <option value="roping">Moulinette</option>
                        <option value="none">Aucun</option>
                    </select>
                </div>
                <div class="label11">
                    <label class="label" for="several-cliff">{{ __('bloc-spot.bloc-form.several-cliff') }}</label>
                    <input class="input" type="checkbox" name="several-cliff" id="several-cliff">
                </div>
                <br>
                <div class="label12">
                    <label class="label" for="max-height">{{ __('bloc-spot.bloc-form.max-height') }}</label>
                    <input class="input" type="number" id="max-height" name="max-height" step="0.01" min="0" value="0">
                </div>
                <div class="label13">
                    <label class="label" for="ways-number">{{ __('bloc-spot.bloc-form.ways-number') }}</label>
                    <select class="input" name="ways-number" id="ways-number">
                        <option value="unknown" selected>Détails non connus</option>
                        <option value="25">Moins de 25 voies</option>
                        <option value="25_50">Entre 25 et 50 voies</option>
                        <option value="50_100">Entre 50 et 100 voies</option>
                        <option value="100_200">Entre 100 et 200 voies</option>
                        <option value="200_300">Entre 200 et 300 voies</option>
                        <option value="300_400">Entre 300 et 400 voies</option>
                        <option value="400_500">Entre 400 et 500 voies</option>
                        <option value="500_1000">Entre 500 et 1000 voies</option>
                        <option value="1000">Plus de 1000 voies</option>
                    </select>
                </div>
                <br>
                <div class="label14">
                    <label class="label" for="quotation-min">{{ __('bloc-spot.bloc-form.quotation-min') }}</label>
                    <select class="input" name="quotation-min" id="quotation-min">
                        @for($i = 3; $i <= 8; $i++)
                            <option value="{{ $i }}a">{{ $i }}a</option>
                            <option value="{{ $i }}a+">{{ $i }}a+</option>
                            <option value="{{ $i }}b">{{ $i }}b</option>
                            <option value="{{ $i }}b+">{{ $i }}b+</option>
                            <option value="{{ $i }}c">{{ $i }}c</option>
                            <option value="{{ $i }}c+">{{ $i }}c+</option>
                        @endfor
                    </select>
                </div>
                <div class="label15">
                    <label class="label" for="quotation-max">{{ __('bloc-spot.bloc-form.quotation-max') }}</label>
                    <select class="input" name="quotation-max" id="quotation-max">
                        @for($i = 3; $i <= 8; $i++)
                            <option value="{{ $i }}a">{{ $i }}a</option>
                            <option value="{{ $i }}a+">{{ $i }}a+</option>
                            <option value="{{ $i }}b">{{ $i }}b</option>
                            <option value="{{ $i }}b+">{{ $i }}b+</option>
                            <option value="{{ $i }}c">{{ $i }}c</option>
                            <option value="{{ $i }}c+">{{ $i }}c+</option>
                        @endfor
                    </select>
                </div>
                <div class="label16">
                    <label class="label" for="rock">{{ __('bloc-spot.bloc-form.rock') }}</label>
                    <select id="rock" name="rock[]" multiple size="1">
                        <option value="unknown">Détails non connus</option>
                        <option value="dolerite">Dolerite</option>
                        <option value="serpentine">Serpentine</option>
                        <option value="porphyry">Porphyre</option>
                        <option value="armorican_sandstone">Grès armoricain</option>
                        <option value="andesite">Andésite</option>
                        <option value="basalt">Basalte</option>
                        <option value="limestone">Calcaire</option>
                        <option value="conglomerate">Conglomérat</option>
                        <option value="composite">Composite</option>
                        <option value="chalk">Craie</option>
                        <option value="gabbro">Gabbro</option>
                        <option value="gneiss">Gneiss</option>
                        <option value="granite">Granite</option>
                        <option value="marble">Marbre</option>
                        <option value="migmatite">Migmatite</option>
                        <option value="quartz">Quartz</option>
                        <option value="quartzite">Quartzite</option>
                        <option value="resin">Résine</option>
                        <option value="rhyolite">Rhyolite</option>
                        <option value="volcanic_rock">Roche volcanique</option>
                        <option value="schist">Schiste</option>
                        <option value="trachyte">Trachyte</option>
                        <option value="tuff">Tuf</option>
                        <option value="other">Autre</option>
                    </select>
                </div>
                <div class="label17">
                    <label class="label" for="profile">{{ __('bloc-spot.bloc-form.profile') }}</label>
                    <select name="profile[]" id="profile" multiple size="1">
                        <option value="slab">Dalle</option>
                        <option value="tilt">Dévers</option>
                        <option value="dihedral">Dièdre</option>
                        <option value="overhang">Surplomb</option>
                        <option value="vertical">Verticale</option>
                    </select>
                </div>
                <div class="label18">
                    <label class="label" for="sockets-types">{{ __('bloc-spot.bloc-form.sockets-types') }}</label>
                    <select name="sockets-types[]" id="sockets-types" multiple size="1">
                        <option value="flat">Aplats</option>
                        <option value="splines">Cannelures</option>
                        <option value="columns">Colonnettes</option>
                        <option value="concretions">Concrétions</option>
                        <option value="rift">Fissure</option>
                        <option value="pebbles">Galets</option>
                        <option value="water_drops">Gouttes d'eau</option>
                        <option value="rulers">Réglettes</option>
                        <option value="holes">Trous</option>
                        <option value="big_catches">Grosses prises</option>
                        <option value="reversed">Inversées</option>
                        <option value="vertical">Verticales</option>
                        <option value="tafonis">Tafonis</option>
                    </select>
                </div>
                <div class="label19">
                    <label class="labelexep" for="restriction">{{ __('bloc-spot.bloc-form.restrictions') }}</label>
                    <textarea class="input2" name="restriction" id="restriction" cols="30" rows="5">Aucunes</textarea>
                </div>
                <div class="label20">
                    <label class="labelexep" for="miscellaneous-information">{{ __('bloc-spot.bloc-form.miscellaneous-information') }}</label>
                    <textarea class="input2" name="miscellaneous-information" id="miscellaneous-information" cols="30" rows="5">Aucunes</textarea>
                </div>
            </div>
                <hr>
                <div class="block5" id="block5">
                    <span class="apropos"><i class="fas fa-plus"></i> Détails</span>
                    <div class="label21">
                        <label class="label" for="image-upload">{{ __('bloc-spot.bloc-form.image-upload') }}</label>
                        <label class="button_upload"><span id="image-upload-text">Choisir un fichier</span>
                            <div id="image-upload"></div>
                        </label>
                        <div>
                            <label class="labelProgress" for="image-upload-progress"></label>
                            <progress class="progressBar" id="image-upload-progress" value="0"></progress>
                        </div>
                    </div>
                    <div class="label22">
                        <label class="label" for="file-upload">{{ __('bloc-spot.bloc-form.file-upload') }}</label>
                        <label class="button_upload"><span id="file-upload-text">Choisir un fichier</span>
                            <div id="file-upload"></div>
                        </label>
                        <div>
                            <label class="labelProgress" for="file-upload-progress"></label>
                            <progress class="progressBar" id="file-upload-progress" value="0"></progress>
                        </div>
                    </div>
                </div>
                <div id="hidden_input">
                    <input type="hidden" name="lat" id="lat" value="">
                    <input type="hidden" name="lng" id="lng" value="">
                </div>
                <button class="submit" id="submit_button" type="submit"><span class="label-submit">Envoyer</span></button>
            </form>
        </div>
@endsection

@once
@section('extra-script')
    <script>
        document.addEventListener('DOMContentLoaded', function (event) {
            //setup all multiselect
            const maxWidth = 400;
            const maxHeight = 250;
            const minWidth = 250;

            new vanillaSelectBox("#recommended-site-for", {search: false, maxWidth: maxWidth, maxHeight: maxHeight, minWidth: minWidth, placeHolder: "{{ __('bloc-spot.bloc-form.recommended-site-for') }}"});
            new vanillaSelectBox("#exposure", {search: false, maxWidth: maxWidth, maxHeight: maxHeight, minWidth: minWidth, placeHolder: "{{ __('bloc-spot.bloc-form.exposure') }}"});
            new vanillaSelectBox("#block-reception-quality", {search: false, maxWidth: maxWidth, maxHeight: maxHeight, minWidth: minWidth, placeHolder: "{{ __('bloc-spot.bloc-form.block-reception-quality') }}"});
            new vanillaSelectBox("#rock", {search: false, maxWidth: maxWidth, maxHeight: maxHeight, minWidth: minWidth, placeHolder: "{{ __('bloc-spot.bloc-form.rock') }}"}).setValue("unknown");
            new vanillaSelectBox("#profile", {search: false, maxWidth: maxWidth, maxHeight: maxHeight, minWidth: minWidth, placeHolder: "{{ __('bloc-spot.bloc-form.profile') }}"});
            new vanillaSelectBox("#sockets-types", {search: false, maxWidth: maxWidth, maxHeight: maxHeight, minWidth: minWidth, placeHolder: "{{ __('bloc-spot.bloc-form.sockets-types') }}"});
        });
    </script>
@endsection

@section('extra')
    <link rel="stylesheet" href="{{ asset('css/vanillaSelectBox.css') }}">
    <script type="text/javascript" src="{{ asset('vendor/jildertmiedema/laravel-plupload/js/plupload.full.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bloc-form.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/vanillaSelectBox.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/navbar-script.js') }}"></script>
    <script src="https://kit.fontawesome.com/4c22a0d41e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/bloc-spot-create-form.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection
@endonce

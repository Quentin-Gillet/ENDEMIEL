<link href="{{ asset('css/bloc-form.css') }}" rel="stylesheet">

<div class="popup">
    <div class="popup_right">
        <button class="button_quit" title="Fermer" onclick="popup_quit()"><i class="fas fa-times"></i></button>
        <h2 class="popup_title">Création de votre spot</h2>
        <form name="form" action="{{ route('bloc-site.create') }}" method="POST" id="newBlockForm" enctype="multipart/form-data">
            <div id="hidden_input">
                @csrf
                <input type="hidden" id="marker_lat_input" name="latitude" value="{{ $location['lat'] }}">
                <input type="hidden" id="marker_lng_input" name="longitude" value="{{ $location['lng'] }}">
            </div>
            <div id="name_form">
                <input class="input_name" type="text" maxlength="255" placeholder="Nom de votre spot" name="name">
                <span style="color: red;" id="input_name_error"></span>
            </div>
            <div id="desc_form">
                <textarea class="input_description" name="description" rows="10" cols="50" placeholder="Ajouter une description"></textarea>
                <span style="color: red;" id="input_desc_error"></span>
            </div>
            <div id="file_form">
                <label type="file" id="file_upload" class="label">
                    <span class="label_title" id="browse-button">Choisir un fichier</span>
                </label>
                <span style="color: red;" id="input_file_error"></span>
            </div>
            <button class="input_button" id="start-upload">Valider</button>
        </form>
        <progress max="100" value="0" id="progress" type="button"></progress>
    </div>
    <div class="popup_left">
        <div class="subpopup"></div>
    </div>
</div>

<script type="text/javascript" src="{{ asset('vendor/jildertmiedema/laravel-plupload/js/plupload.full.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bloc-form.js') }}"></script>


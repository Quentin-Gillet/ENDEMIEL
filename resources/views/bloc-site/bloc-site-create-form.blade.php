<link href="{{ asset('css/bloc-form.css') }}" rel="stylesheet">
<script src="{{ asset('js/bloc-form.js') }}"></script>

<div class="popup">
    <div class="popup_right">
        <button class="button_quit" title="Fermer" onclick="popup_quit()"><i class="fas fa-times"></i></button>
        <h2 class="popup_title">Création de votre spot</h2>
        <form name="form" action="{{ route('bloc-site.create') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" id="marker_lat_input" name="latitude" value="{{ $location['lat'] }}">
            <input type="hidden" id="marker_lng_input" name="longitude" value="{{ $location['lng'] }}">
            <input class="input_name" type="text" placeholder="Nom de votre spot" name="name">
            <textarea class="input_description" name="description" rows="10" cols="50" placeholder="Ajouter une description"></textarea>
            <label type="file" class="label" onclick="check_file()">
                <span class="label_title">Choisir un fichier</span>
                <input class="input_image" name="files" type="file" accept=".jpg,.jpeg,.png">
            </label>
            <button class="input_button" type="submit">Valider</button>
        </form>
    </div>
    <div class="popup_left">
        <div class="subpopup"></div>
    </div>
</div>

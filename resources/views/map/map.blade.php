@section('extra-css')
    @parent
    <link href="{{ asset('css/map.css') }}" rel="stylesheet">
@endsection

@section('extra-js')
    @parent
    <script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCLOBBi470XIAX1gnetthnSwET6XtorLEM&callback=initMap&language=fr"></script>
    <script src="{{ asset('js/map.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/js-marker-clusterer/1.0.0/markerclusterer_compiled.js"></script>
@endsection

    <section>
    <div class="container">
        <div class="inner">
            <div>
                <h2 class="title_map">Explorer, Grimper, parmi les nombreux spots d escalade disponibles !</h2>
            </div>
            <div id="container_map"></div>
        </div>
    </div>
    <div class="popup" style="display: none">
        <div class="popup_right">
            <button class="button_quit" title="Fermer" onclick="popup_quit()"><i class="fas fa-times"></i></button>
            <h2 class="popup_title">Création de votre spot</h2>
            <form name="form" action="{{ route('marker.create') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="marker_lat_input" name="latitude">
                <input type="hidden" id="marker_lng_input" name="longitude">
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
</section>

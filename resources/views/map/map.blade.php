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
    <div class="popup">
        <div class="popup_right">
            <h2 class="popup_title">Création de votre spot</h2>
            <form name="form">
                <input class="input_name" type="text" placeholder="Nom de votre spot">
                <textarea class="input_description" rows="10" cols="50" placeholder="Ajouter une description"></textarea>
                <label type="file" class="label">
                    <span class="label_title">Choisir un fichier</span>
                    <input class="input_image" type="file">
                </label>
            </form>
            <button class="input_button">Valider</button>
        </div>
        <div class="popup_left">
            <div class="subpopup">

            </div>

        </div>
    </div>
</section>

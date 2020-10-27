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
                <h2 class="title_map">Explorer, Grimper, parmi les nombreux spots d'escalade disponibles !</h2>
            </div>
            <div id="container_map"></div>
        </div>
    </div>
</section>

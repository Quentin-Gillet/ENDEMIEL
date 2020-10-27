@section('extra-css')
    @parent
    <link href="{{ asset('css/map.css') }}" rel="stylesheet">
@endsection

@section('extra-js')
    @parent
    <script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC9DLSGr9zgS3xCeEuQcQXH2jSDH1vAhis&callback=initMap"></script>
@endsection

    <section>
    <div class="container">
        <div class="inner">
            <div>
                <h2 class="title_map">Explorer, Grimper, parmi les nombreux spots d'escalde disponibles !</h2>
            </div>
            <div id="container_map"></div>
        </div>
    </div>
</section>

@section('extra-script')
    <script>
        function initMap(){
            var options = {
                zoom: 8,
                center: {lat: 48.866667, lng: 2.333333},
            };

            var map = new google.maps.Map(document.getElementById('container_map'), options);
        }
    </script>
@endsection

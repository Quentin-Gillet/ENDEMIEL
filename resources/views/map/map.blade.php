@section('extra-css')
    @parent
    <link href="{{ asset('css/map.css') }}" rel="stylesheet">
@endsection

<section>
    <div class="container">
        <div class="inner">
            <div>
                <h2 class="title_map">Explorer, Grimper, parmi les nombreux spots d'escalade disponibles !</h2>
            </div>
            <div class="container_map"></div>
        </div>
    </div>
</section>

@section("extra-css")
    @parent
    <link href="{{ asset('css/search-bar.css') }}" rel="stylesheet">
@endsection

<section>
    <div class="search">
        <form class="search_bar">
            @csrf
            <input class="search_enter" id="search" type="text" alt="" name="search" placeholder="Rechercher des spots...">
            <button class="search_button"><i class="fas fa-search"></i></button>
        </form>
    </div>
</section>

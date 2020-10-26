@section("extra-css")
    <link href="{{ asset('vendor/courier/css/Search_bar.css') }}" rel="stylesheet">
@endsection
@section("extra-js")
    <script src="https://kit.fontawesome.com/4c22a0d41e.js" crossorigin="anonymous"></script>
@endsection
<section>
    <div class="search">
        <form class="search_bar">
            <input class="search_enter" id="search" type="text" alt="" name="search" placeholder="Rechercher des spots...">
            <button class="search_button"><i class="fas fa-search"></i></button>
        </form>
    </div>
</section>

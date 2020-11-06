<section>
    <div class="container">
        <div class="inner">
            <div>
                <h2 class="title_map">{{ $blocSite->name }}</h2>
            </div>
            <div id="container_map">
                <div>Description: {{ $blocSite->description }}</div>
                @if($blocSite->hasFiles())
                    <div class="photo_gallery">
                        {{--     Gallerie de toute les photo du sites           --}}
                        @foreach($blocSite->files as $file)
                            <img src="{{ $file->getStoragePath() }}">
                        @endforeach
                    </div>
                @endif
            </div>
            <div>
                {{--     Ici je vais dislpay une map pour montrer ou est le site           --}}
            </div>
        </div>
    </div>
</section>

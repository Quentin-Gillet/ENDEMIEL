@foreach($mapMarkers as $mapMarker)

    @if($mapMarker->id == 28)
        <img src="{{$mapMarker->files->first()->getStoragePath() }}" alt="pas trouvée">
    @endif

@endforeach

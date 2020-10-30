<div>Nom: {{ $mapMarker->name }}</div>
<br>
<div>Description: {{ $mapMarker->description }}</div>
<br>
<span>Image:
    @if($mapMarker->hasFiles())
        <img width="100" height="100" src="{{ $mapMarker->files->first()->getStoragePath() }}" alt="Aucune image pour se spot">
    @else
        <p>Aucune image pour se spot</p>
    @endif
</span>
<br>
<a href="{{ route('login') }}">Voir plus...</a>

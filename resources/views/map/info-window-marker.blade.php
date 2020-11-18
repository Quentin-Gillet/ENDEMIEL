<div>Nom: {{ $blocSpot->name }}</div>
<br>
<span>Image:
    @if($blocSpot->hasFiles())
        <img width="100" height="100" src="{{ $blocSpot->files->first()->getStoragePath() }}" alt="Aucune image pour se spot">
    @else
        <p>Aucune image pour se spot</p>
    @endif
</span>
<br>
<button><a href="{{ route('bloc-spot.get', $blocSpot->id) }}">Voir plus...</a></button>

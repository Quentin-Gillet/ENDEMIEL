<div>Nom: {{ $blocSite->name }}</div>
<br>
<span>Image:
    @if($blocSite->hasFiles())
        <img width="100" height="100" src="{{ $blocSite->files->first()->getStoragePath() }}" alt="Aucune image pour se spot">
    @else
        <p>Aucune image pour se spot</p>
    @endif
</span>
<br>
<button><a href="{{ route('bloc-site.get', $blocSite->id) }}">Voir plus...</a></button>

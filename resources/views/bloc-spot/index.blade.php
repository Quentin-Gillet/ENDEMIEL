
<link href="{{ asset('css/bloc-spot.css') }}" rel="stylesheet">

@if(!isset($action))
    {{-- HERE CODE FOR NAVIGATE TROUGHT SPOTS --}}
@elseif($action == 'create')
    @include('map.marker-indicators')
    @include('bloc-spot.bloc-spot-create-form')
@elseif($action == 'view')
    @include('bloc-spot.view')
@endif

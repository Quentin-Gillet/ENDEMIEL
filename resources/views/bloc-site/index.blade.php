@include('layouts.master')
<link href="{{ asset('css/bloc-site.css') }}" rel="stylesheet">

@if($action == 'create')
    @include('map.marker-indicators')
    @include('bloc-site.bloc-site-create-form')
@elseif($action == 'view')
    @include('bloc-site.view')
@endif

<?php

namespace App\Http\Controllers;

use App\Models\BlocSite;
use Illuminate\Http\Request;

class MapMarkerController extends Controller
{
    public function all(){
        return BlocSite::all();
    }

    public function getInfoWindow($id){
        $blocSite = BlocSite::find($id);
        return view('map.info-window-marker', compact('blocSite'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\BlocSpot;
use Illuminate\Http\Request;

class MapMarkerController extends Controller
{
    public function all(){
        return BlocSpot::all()->where('accept_status', 'approved');
    }

    public function getInfoWindow($id){
        $blocSpot = BlocSpot::find($id);
        return view('map.info-window-marker', compact('blocSpot'));
    }
}

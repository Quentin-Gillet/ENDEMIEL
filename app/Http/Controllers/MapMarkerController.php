<?php

namespace App\Http\Controllers;

use App\Models\MapMarker;
use Illuminate\Http\Request;

class MapMarkerController extends Controller
{

    public function all(){
        return MapMarker::all();
    }

    public function get($id){
        return MapMarker::findOrFail($id);
    }

    public function create(Request $request){
        dd('ok');
        $data = $request->validate([
            'lat' => 'required|numeric',
            'lng' => 'required|numeric',
            'name' => 'required|max:255',
            'images' => 'image'
        ]);

        MapMarker::create($data);
    }

    public function update($id){
        $data = request()->all();
        MapMarker::where('id', $id)->update($data);
    }

}

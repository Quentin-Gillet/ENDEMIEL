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
        $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'name' => 'required|max:255',
            'images' => 'mimes:jpeg,jpg,png'
        ]);

        $data = $request->all();
        MapMarker::create($data);

        return back()->with('success', 'Nouveau spot ajouter et en attente de vérification.');
    }

    public function update($id){
        $data = request()->all();
        MapMarker::where('id', $id)->update($data);
    }

}

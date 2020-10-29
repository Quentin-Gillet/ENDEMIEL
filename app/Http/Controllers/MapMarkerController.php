<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\MapMarker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'files' => 'mimes:jpeg,jpg,png'
        ]);

        $data = $request->all();
        $mapMarker = MapMarker::create($data);

        if ($request->hasFile('files')) {
            foreach (request()->allFiles() as $file){
                $path = $file->store('public/files');
                $path = ltrim($path, 'public/');
                $file = File::create([
                    'url' => $path,
                    'marker_id' => $mapMarker->id,
                ]);
            }
        }

        if ($user = auth()->user()){
            $user->mapMarkers()->save($mapMarker);
        }

        return back()->with('success', 'Nouveau spot ajouter et en attente de vérification.');
    }

    public function update($id){
        $data = request()->all();
        MapMarker::where('id', $id)->update($data);
    }

    public function test(){
        $mapMarkers = MapMarker::all();
        return view('test.test',compact('mapMarkers'));
    }

}

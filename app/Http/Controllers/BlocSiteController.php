<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\BlocSite;
use Illuminate\Http\Request;

class BlocSiteController extends Controller
{

    public function get($id){
        $blocSite = BlocSite::findOrFail($id);
        return view('bloc-site.index', ['action' => 'view', 'blocSite' => $blocSite]);
    }

    public function redirectToCreatePage($lat, $lng){
        $params = [
            'lat' => $lat,
            'lng' => $lng,
        ];
        return view('bloc-site.index', ['action' => 'create', 'location' => $params]);
    }

    public function create(Request $request){
        $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'name' => 'required|max:255',
            'description' => 'required',
            'files' => 'mimes:jpeg,jpg,png'
        ]);

        $data = $request->all();
        $blocSite = BlocSite::create($data);

        if ($request->hasFile('files')) {
            foreach (request()->allFiles() as $file){
                $path = $file->store('public/files');
                $path = ltrim($path, 'public/');
                $file = File::create([
                    'url' => $path,
                    'bloc_site_id' => $blocSite->id,
                    'file_type' => 'image'
                ]);
            }
        }

        if ($user = auth()->user()){
            $user->blocSite()->save($blocSite);
        }
        return redirect()->route('index')->with('success', 'Nouveau spot ajouter et en attente de vérification.');
    }

}

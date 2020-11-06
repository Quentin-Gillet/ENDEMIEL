<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlocSiteRequest;
use App\Models\File;
use App\Models\BlocSite;
use Illuminate\Http\Request;

class BlocSiteController extends Controller
{

    public function get($id){
        $blocSite = BlocSite::where('id', $id)->where('status', 'approved')->firstOrFail();
        return view('bloc-site.index', ['action' => 'view', 'blocSite' => $blocSite]);
    }

    public function redirectToCreatePage($lat, $lng){
        if ($lat == null || $lng == null){
            return route('index');
        }
        $params = [
            'lat' => $lat,
            'lng' => $lng,
        ];
        return view('bloc-site.index', ['action' => 'create', 'location' => $params]);
    }

    public function create(BlocSiteRequest $request){
        $validated = $request->validated();
        $validated['status'] = 'approved'; //TODO REMOVE FOR PRODUCTION
        $blocSite = BlocSite::create($validated);
        $file = File::where('file_upload_id', '=', $validated['file_upload_id'])->first();
        $blocSite->files()->save($file);

        if ($user = auth()->user()){
            $user->blocSite()->save($blocSite);
        }
        return redirect()->route('index')->with('success', 'Nouveau spot ajouter et en attente de vérification.');
    }

    public function search($value){
        return BlocSite::where('id', '=', $value)
                        ->orWhere('name', 'like', $value)
                        ->orWhere('lat', 'like', $value)
                        ->orWhere('description', 'like', $value)
                        ->orWhere('lng', 'like', $value)->first();
    }

}

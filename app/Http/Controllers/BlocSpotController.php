<?php

namespace App\Http\Controllers;


use App\Http\Requests\BlocSpotRequest;
use App\Models\File;
use App\Models\BlocSpot;
use Illuminate\Http\Request;

class BlocSpotController extends Controller
{

    public function index(){
        return view('bloc-spot.index');
    }

    public function get($id){
        $blocSpot = BlocSpot::where('id', $id)->where('accept_status', 'approved')->firstOrFail();
        return view('bloc-spot.index', ['action' => 'view', 'blocSpot' => $blocSpot]);
    }

    public function create(Request $request){
        if ($request->get('lat') && $request->get('lng')){
            $location = ['lat' => $request->get('lat'), 'lng' => $request->get('lng')];
            return view('bloc-spot.index', ['action' => 'create', 'location' => $location]);
        }

        return view('bloc-spot.index', ['action' => 'create']);
    }

    public function store(BlocSpotRequest $request){
        $validated = $request->validated();

        $validated['accept_status'] = 'approved'; //TODO REMOVE FOR PRODUCTION
        $validated['region'] = 'PACA'; //TODO REMOVE FOR PRODUCTION
        $blocSpot = BlocSpot::create($validated);
        $file = File::where('file_upload_id', '=', $validated['file_upload_id'])->first();
        $blocSpot->files()->save($file);

        if ($user = auth()->user()){
            $user->blocSpot()->save($blocSpot);
        }
        return redirect()->route('index')->with('success', 'Nouveau spot ajouter et en attente de vérification.');
    }

    public function search($value){
        return BlocSpot::where('id', '=', $value)
                        ->orWhere('name', 'like', $value)
                        ->orWhere('lat', 'like', $value)
                        ->orWhere('description', 'like', $value)
                        ->orWhere('lng', 'like', $value)->first();
    }

}

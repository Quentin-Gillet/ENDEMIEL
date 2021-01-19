<?php

namespace App\Http\Controllers;


use App\Http\Requests\BlocSpotRequest;
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

    public function create(Request $request)
    {
        if ($request->get('lat') && $request->get('lng')) {
            $location = ['lat' => $request->get('lat'), 'lng' => $request->get('lng')];
            return view('bloc-spot.index', ['action' => 'create', 'location' => $location]);
        }

        return view('bloc-spot.index', ['action' => 'create']);
    }

    public function store(BlocSpotRequest $request)
    {
        $inputToJson = [];
        foreach ($request->all() as $key => $value) {
            if ($key == 'site-name' || $key == 'lat' || $key == 'lng' || $key == 'file_id' || $key == '_token' || $key == '_method') continue;
            $inputToJson[$key] = $value;
        }

        $dataToSave = [
            'lat' => $request->get('lat'),
            'lng' => $request->get('lng'),
            'site-name' => $request->get('site-name'),
            'data' => json_encode($inputToJson),
            'accept_status' => 'validated',
        ];

        $blocSpot = BlocSpot::create($dataToSave);
        /*$file = File::where('file_upload_id', '=', $validated['file_upload_id'])->first();
        $blocSpot->files()->save($file);

        if ($user = auth()->user()){
            $user->blocSpot()->save($blocSpot);
        }*/
        return redirect()->route('index')->with('success', 'Nouveau spot ajouter et en attente de vérification.');
    }

}

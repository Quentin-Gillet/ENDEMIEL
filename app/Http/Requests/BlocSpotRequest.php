<?php

namespace App\Http\Requests;

use App\Models\File;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;

class BlocSpotRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'lat' => 'required|numeric',
            'lng' => 'required|numeric',
            'place_name' => 'required|max:255',
            'place_description' => 'required',
            'type' => 'required|exists:bloc_spot_types,value',
            'accessibility' => 'required|exists:bloc_spot_accessibility,value',
            'difficulty' => 'required|exists:bloc_spot_difficulties,value',
            'ways' => 'required|numeric',
            'file_upload_id' => 'required',
            //'region' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'lat.required' => "Nous avons besoin de la latitude.",
            'lng.required' => 'Nous avons besoin de la longitude.',
            'place_name.required' => 'Le site doit avoir un nom.',
            'place_name.max' => 'Le nom du site ne peut faire maximum 255 caractères.',
            'place_description.required' => 'Le site doit avoir une description.',
            'ways.required' => 'Le spot doit avoir au moins une voie.',
            'ways.numeric' => 'Le nombre doit être valide',
            'type.required' => 'Erreur, réessayez.',
            'type.exist' => 'Erreur, réessayez.',
            'accessibility.required' => 'Erreur, réessayez.',
            'accessibility.exist' => 'Erreur, réessayez.',
            'difficulty.required' => 'Erreur, réessayez.',
            'difficulty.exist' => 'Erreur, réessayez.',
            'file_upload_id.required' => 'Impossible de trouver le fichier ajouté. Veuillez réessayer.',
        ];
    }

    /**
     * Return validation errors as json response
     *
     * @param Validator $validator
     */
    protected function failedValidation(Validator $validator)
    {
        if ($validator->fails()){
            $file = File::where('file_upload_id', $this->request->get('file_upload_id'))->first();
            Storage::delete($file->url);
            $file->delete();
        }
    }

}

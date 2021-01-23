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
            'site-name' => 'required|max:255',
            'recommended-site-for' => 'required|array',
            'exposure' => 'required|array',
            'near-city' => 'required|max:255',
            'approach-method' => 'required|numeric',
            'approach-time' => 'required|numeric',
            'for-children' => 'required',
            'block-reception-quality' => 'required|array',
            'climbing-type' => 'required',
            'equipment-type' => 'required',
            'several-cliff' => 'required',
            'max-height' => 'required|numeric',
            'ways-number' => 'required',
            'quotation-min' => 'required',
            'quotation-max' => 'required',
            'rock' => 'required|array',
            'profile' => 'required|array',
            'sockets-type' => 'required|array',
            'restriction' => 'required',
            'miscellaneous-information' => 'required',
            'file_upload_id' => 'array',
        ];
    }

    public function messages()
    {
        return [
            'lat.required' => "Nous avons besoin de la latitude.",
            'lng.required' => 'Nous avons besoin de la longitude.',
            'site-name.required' => 'Le site doit avoir un nom.',
            'site-name.max' => 'Le nom du site ne peut faire que 255 caractères.',
            'recommended-site-for.required' => 'Pour qui le site est recommandé ?',
            'exposure' => 'Quel est l\'exposition du site',
            'near-city' => 'Quelle est la ville la plus proche ?',
            'near-city.max' => 'Le nom de la ville ne peut faire que 255 caractères.',
            'approach-method' => 'Par quelle methode peut-on approcher ?',
            'approach-time' => 'Combien de temps pour accéder au site ?',
            'for-children' => 'Le site peut accueillir des enfants ?',
            'block-reception-quality' => 'Les blocs de receptions sont-ils de bonnes qualités ?',
            'climbing-type' => 'Quel est le type d\'escalade',
            'equipment-type' => 'Quel est le type d\'équipement présent ?',
            'several-cliff' => 'A-t-il plusieurs falaises ?',
            'max-height' => 'Quelle est la hauteur maximale ?',
            'ways-number' => 'Combien de voies sont présentes ?',
            'quotation-min' => 'Quelle est la difficulté minimal ?',
            'quotation-max' => 'Quelle est la difficulté maximal ?',
            'rock' => 'Quelle est le type de roche ?',
            'profile' => 'Quel est le profil ?',
            'sockets-type' => 'Quelles sont les types de prises ?',
            'restriction' => 'Quelles sont les restrictions ?',
            'miscellaneous-information' => 'Quelles sont les informations du site ?',
            'file_upload_id' => 'Au moins une image dois être présente',
        ];
    }

    /**
     * Return validation errors as json response
     *
     * @param Validator $validator
     */
    protected function failedValidation(Validator $validator)
    {
        if ($validator->fails()) {
            foreach ($this->request->get('file-upload-id') as $fileId) {
                $file = File::where('file_upload_id', $fileId)->first();
                Storage::delete($file->url);
                $file->delete();
            }
        }
    }

}

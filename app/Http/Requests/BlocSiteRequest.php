<?php

namespace App\Http\Requests;

use App\Models\File;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;

class BlocSiteRequest extends FormRequest
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
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'name' => 'required|max:255',
            'description' => 'required',
            'file_upload_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'latitude.required' => "Nous avons besoin de la latitude.",
            'longitude.required' => 'Nous avons besoin de la longitude.',
            'name.required' => 'Le site doit avoir un nom.',
            'name.max' => 'Le nom du site ne peut faire maximum 255 caractères.',
            'description.required' => 'Le site doit avoir une description.',
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

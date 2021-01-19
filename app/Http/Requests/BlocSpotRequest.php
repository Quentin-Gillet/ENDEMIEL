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
            'recommend-site-for' => 'required|array',
            'exposure' => 'required|array',
            'near-city' => 'required|max:255',
            'approach-method' => 'required|numeric',
            'approach-time' => 'required|numeric',
            'for-children' => 'required',
            'block-reception-quality' => 'required|array',
            'climbing-type' => 'required',
            'equipment-type' => 'required',
            'several-cliff' => 'required|boolean',
            'max-height' => 'required|numeric',
            'ways-number' => 'required',
            'quotation-min' => 'required',
            'quotation-max' => 'required',
            'rock' => 'required|array',
            'profile' => 'required|array',
            'sockets-type' => 'required|array',
            'restriction' => 'required',
            'miscellaneous-information' => 'required',
            //'file_upload_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'lat.required' => "Nous avons besoin de la latitude.",
            'lng.required' => 'Nous avons besoin de la longitude.',
            'site-name.required' => 'Le site doit avoir un nom.',
            'site-name.max' => 'Le nom du site ne peut faire maximum 255 caractères.',
        ];
    }

    /**
     * Return validation errors as json response
     *
     * @param Validator $validator
     */
    protected function failedValidation(Validator $validator)
    {
        return;
        if ($validator->fails()){
            $file = File::where('file_upload_id', $this->request->get('file_upload_id'))->first();
            Storage::delete($file->url);
            $file->delete();
        }
    }

}

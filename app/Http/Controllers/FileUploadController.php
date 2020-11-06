<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use JildertMiedema\LaravelPlupload\Facades\Plupload;

class FileUploadController extends Controller
{
    public function filesUpload(){
        return Plupload::receive('file', function ($file)
        {
            $path = Storage::putFile('/public/files', $file);
            File::create([
                'url' => $path,
                'file_upload_id' => explode('.', $file->getClientOriginalName())[0],
                'file_type' => $file->extension() //TODO fill file type with correct file type
            ]);

            return True;
        });
    }
}

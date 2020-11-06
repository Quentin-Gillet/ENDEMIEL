<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class File extends Model
{
    use HasFactory;

    protected $fillable = ['bloc_site_id', 'url', 'file_type', 'file_upload_id'];

    public function blocSite(){
        return $this->belongsTo('App\Models\BlocSite', 'id', 'bloc_site_id');
    }

    public function getStoragePath(){
        return asset('/storage/' . $this->url);
    }
}

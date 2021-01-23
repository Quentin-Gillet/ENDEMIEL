<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = ['bloc_site_id', 'url', 'file_type', 'file_upload_id'];

    public function blocSpot()
    {
        return $this->belongsTo('App\Models\BlocSpot', 'id', 'bloc_site_id');
    }

    public function getStoragePath(): string
    {
        return asset('/storage/' . $this->url);
    }
}

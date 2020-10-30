<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class File extends Model
{
    use HasFactory;

    protected $fillable = ['marker_id', 'url'];

    public function mapMarker(){
        return $this->belongsTo('App\Models\MapMarker', 'id', 'marker_id');
    }

    public function getStoragePath(){
        return asset('/storage/' . $this->url);
    }
}

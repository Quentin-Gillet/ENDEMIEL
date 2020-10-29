<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MapMarker extends Model
{
    use HasFactory;

    protected $fillable = ['latitude', 'longitude', 'name', 'description'];

    public function isApproved(){
        return $this->status == 'approved';
    }

    public function author(){
        return $this->belongsTo('App\Models\User', 'id', 'author_id');
    }

    public function files(){
        return $this->hasMany('App\Models\File', 'marker_id');
    }

}

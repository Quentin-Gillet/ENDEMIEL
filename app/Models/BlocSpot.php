<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlocSpot extends Model
{
    use HasFactory;

    protected $fillable = [
        'lat', 'lng', 'site-name', 'data', 'accept_status', 'author_id',
    ];

    public function isApproved(){
        return $this->accept_status == 'approved';
    }

    public function author(){
        return $this->belongsTo('App\Models\User', 'id', 'author_id');
    }

    public function files(){
        return $this->hasMany('App\Models\File', 'bloc_spot_id');
    }

    public function hasFiles(){
        return $this->files()->exists();
    }


}

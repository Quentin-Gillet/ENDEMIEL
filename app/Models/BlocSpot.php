<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    public static function getAccessibilityAttributes(){
        return DB::table('bloc_spot_accessibility')->get('value');
    }

    public static function getDifficultiesAttributes(){
        return DB::table('bloc_spot_difficulties')->get('value');
    }

    public static function getTypesAttributes(){
        return DB::table('bloc_spot_types')->get('value');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function PHPUnit\Framework\isEmpty;

class BlocSite extends Model
{
    use HasFactory;

    protected $fillable = ['latitude', 'longitude', 'name', 'description', 'status'];

    public function isApproved(){
        return $this->status == 'approved';
    }

    public function author(){
        return $this->belongsTo('App\Models\User', 'id', 'author_id');
    }

    public function files(){
        return $this->hasMany('App\Models\File', 'bloc_site_id');
    }

    public function hasFiles(){
        return $this->files()->exists();
    }

}

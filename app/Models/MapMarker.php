<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MapMarker extends Model
{
    use HasFactory;

    protected $fillable = ['latitude', 'longitude', 'address', 'type', 'title', 'description', 'images'];

    public function isApproved(){
        return $this->status == 'approved';
    }

}

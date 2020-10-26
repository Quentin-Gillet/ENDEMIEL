<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MapMarker extends Model
{
    protected $fillable = ['latitude', 'longitude', 'address', 'type', 'title', 'description', 'images'];
}

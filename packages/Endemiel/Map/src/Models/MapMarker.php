<?php

namespace Endemiel\Map\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MapMarker extends Model
{
    protected $fillable = ['latitude', 'longitude', 'title', 'description', 'images'];
}

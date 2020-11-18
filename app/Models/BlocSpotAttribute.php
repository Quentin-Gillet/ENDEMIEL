<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlocSpotAttribute extends Model
{
    use HasFactory;

    protected $table = 'bloc_spot_attributes';

    protected $fillable = ['code', 'name', 'type', 'position', 'is_required'];

    public function options(){
        return $this->hasMany('App\Models\BlocSpotAttributesOption','attribute_id');
    }
}

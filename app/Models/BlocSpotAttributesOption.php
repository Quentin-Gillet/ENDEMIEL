<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlocSpotAttributesOption extends Model
{
    use HasFactory;

    protected $table = 'bloc_spot_attributes_options';

    protected $fillable = ['value', 'attribute_id'];

    public function attribute()
    {
        return $this->belongsTo('App\Models\BlocSpotAttribute', 'id', 'attribute_id');
    }
}

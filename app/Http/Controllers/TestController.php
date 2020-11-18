<?php

namespace App\Http\Controllers;

use App\Models\BlocSpot;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test(){
        return BlocSpot::getTypesAttributes();
    }
}

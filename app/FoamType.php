<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FoamType extends Model
{
    public function blocks(){
        return $this->hasMany('App\Block');
    }
}

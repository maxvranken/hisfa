<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    public function foamType()
    {
        return $this->belongsTo('App\FoamType');
    }
}

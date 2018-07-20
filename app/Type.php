<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public function materiels()
    {
        return $this->hasMany('Materiel');
    }
}

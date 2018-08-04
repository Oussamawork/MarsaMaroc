<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reforme extends Model
{
    public function materiels()
    {
        return $this->hasMany(Materiel::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bonsortie extends Model
{
    public function pannes()
    {
        return $this->hasMany('Panne');
    }
}

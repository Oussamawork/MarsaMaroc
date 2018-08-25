<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soustraitant extends Model
{
    public function pannes()
    {
        return $this->hasMany(Panne::class);
    }
}

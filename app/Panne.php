<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Panne extends Model
{
    public function materiel()
    {
        return $this->belongsTo(Materiel::class);
    }

    public function soustraitant()
    {
        return $this->belongsTo(Soustraitant::class);
    }

    public function bonsortie()
    {
        return $this->belongsTo(Bonsortie::class);
    }
}

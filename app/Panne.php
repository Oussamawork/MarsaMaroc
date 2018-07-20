<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Panne extends Model
{
    public function materiel()
    {
        return $this->belongsTo('Materiel');
    }

    public function sous_traitant()
    {
        return $this->belongsTo('Soustraitant');
    }

    public function bonsortie()
    {
        return $this->belongsTo('Bonsortie');
    }
}

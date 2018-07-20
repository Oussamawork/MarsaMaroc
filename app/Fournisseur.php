<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    public function materiels()
    {
        return $this->hasMany('Materiel');
    }
}

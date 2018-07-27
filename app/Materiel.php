<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materiel extends Model
{
    public function utilisateurs()
    {
        return $this->belongsToMany('App\Utilisateur','utilisateur_materiel');
    }

    public function fournisseur()
    {
        return $this->belongsTo('Fournisseur');
    }

    public function reforme()
    {
        return $this->belongsTo('Reforme');
    }

    public function pannes()
    {
        return $this->hasMany('Panne');
    }

    public function type()
    {
        return $this->belongsTo('Type');
    }
}

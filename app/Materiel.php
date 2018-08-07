<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materiel extends Model
{
    
    public function utilisateurs()
    {
        return $this->belongsToMany(Utilisateur::class,'utilisateur_materiel')->withPivot('start_affectation', 'end_affectation');
    }

    public function fournisseur()
    {
        return $this->belongsTo(Fournisseur::class);
    }

    public function reforme()
    {
        return $this->belongsTo(Reforme::class);
    }

    public function pannes()
    {
        return $this->hasMany(Panne::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function isReformed()
    {
        return ($this->reforme_id != null) ? true : false;
    }

    public function isDisponible()
    {
        return !filled($this->utilisateurs) ? true : false; 
    }

    public function isAffected()
    {
        return $this->utilisateurs
                    ->last()
                    ->pivot
                    ->end_affectation ? true : false;
    }
    
}

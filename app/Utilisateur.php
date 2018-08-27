<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    protected $fillable = ['firstname', 'lastname', 'recrutment_date', 'matricule'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function materiels()
    {
        return $this->belongsToMany(Materiel::class,'utilisateur_materiel')->withPivot('start_affectation', 'end_affectation');
    }

    public function entity()
    {
        return $this->belongsTo(Entity::class);
    }

    public function getFullName($id)
    {
        return Utilisateur::find($id);
    }
}

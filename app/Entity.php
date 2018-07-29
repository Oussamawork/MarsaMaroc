<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
    public function utilisateurs()
    {
        return $this->hasMany(Utilisateur::class);
    }
}

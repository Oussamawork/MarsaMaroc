<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    public function user()
    {
        return $this->belongsTo('User');
    }

    public function materiels()
    {
        return $this->belongsToMany('Materiel');
    }
}

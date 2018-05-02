<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelAnimal extends Model
{
    protected $table = 'animals';

    public function seccions()
    {
        return $this->hasMany('App\ModelSeccio', 'animal_id');
    }
}

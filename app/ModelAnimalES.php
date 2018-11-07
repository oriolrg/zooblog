<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelAnimalES extends Model
{
    protected $table = 'animals_ES';

    public function seccions()
    {
        return $this->hasMany('App\ModelSeccio', 'animal_id');
    }
}

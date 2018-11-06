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
    public function animalsES()
    {
        return $this->hasOne('App\ModelAnimalES', 'animalsES_id');
    }
    public function animalsEN()
    {
        return $this->hasOne('App\ModelAnimalEN', 'animalsEN_id');
    }
}

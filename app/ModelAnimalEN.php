<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelAnimalEN extends Model
{
    protected $table = 'animals_EN';

    public function seccions()
    {
        return $this->hasMany('App\ModelSeccio', 'animal_id');
    }
    public function animals()
    {
        return $this->belongsTo('App\ModelAnimal');
    }
}

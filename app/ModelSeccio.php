<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelSeccio extends Model
{
    protected $table = 'seccions';
    public function seccionsES()
    {
        return $this->hasOne('App\ModelSeccioES', 'seccions_id');
    }
    public function seccionsEN()
    {
        return $this->hasOne('App\ModelSeccioEN', 'seccions_id');
    }
}

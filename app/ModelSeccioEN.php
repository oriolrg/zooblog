<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelSeccioEN extends Model
{
    protected $table = 'seccionsEN';
    public function seccions()
    {
        return $this->belongsTo('App\ModelSeccio');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelSeccioES extends Model
{
    protected $table = 'seccionsES';
    public function seccions()
    {
        return $this->belongsTo('App\ModelSeccio');
    }
}

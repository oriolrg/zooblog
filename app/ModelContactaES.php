<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelContactaES extends Model
{
    protected $table = 'contactaES';
    public function contacta()
    {
        return $this->belongsTo('App\ModelContacta');
    }
}

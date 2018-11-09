<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelContactaEN extends Model
{
    protected $table = 'contactaEN';
    public function contacta()
    {
        return $this->belongsTo('App\ModelContacta');
    }
}

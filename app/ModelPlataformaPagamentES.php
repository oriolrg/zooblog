<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelPlataformaPagamentES extends Model
{
    protected $table = 'plataforma_pagamentES';
    public function plataforma()
    {
        return $this->belongsTo('App\plataforma_pagament');
    }
}

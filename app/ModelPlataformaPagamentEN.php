<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelPlataformaPagamentEN extends Model
{
    protected $table = 'plataforma_pagamentEN';
    public function plataforma()
    {
        return $this->belongsTo('App\plataforma_pagament');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelPlataformaPagament extends Model
{
    protected $table = 'plataforma_pagament';
    public function plataformaES()
    {
        return $this->hasOne('App\ModelPlataformaPagamentES', 'plataforma_id');
    }
    public function plataformaEN()
    {
        return $this->hasOne('App\ModelPlataformaPagamentEN', 'plataforma_id');
    }
}

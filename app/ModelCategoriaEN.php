<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelCategoriaEN extends Model
{
    protected $table = 'categorias_EN';
    public function families()
    {
        return $this->belongsTo('App\ModelCategoria');
    }
}

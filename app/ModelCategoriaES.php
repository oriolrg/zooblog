<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelCategoriaES extends Model
{
    protected $table = 'categorias_ES';
    public function families()
    {
        return $this->belongsTo('App\ModelCategoria');
    }
}

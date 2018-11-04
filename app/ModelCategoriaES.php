<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelCategoriaES extends Model
{
    protected $table = 'categorias_ES';
    public function animals()
    {
        return $this->hasMany('App\ModelAnimal', 'categoria_id');
    }
    public function families()
    {
        return $this->belongsTo('App\ModelCategoria');
    }
}

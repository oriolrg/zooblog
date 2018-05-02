<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelCategoria extends Model
{
    protected $table = 'categorias';
    public function animals()
    {
        return $this->hasMany('App\ModelAnimal', 'categoria_id');
    }
}

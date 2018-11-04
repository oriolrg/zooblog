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
    public function familiaES()
    {
        return $this->hasOne('App\ModelCategoriaES', 'categoriasES_id');
    }
    public function familiaEN()
    {
        return $this->hasOne('App\ModelCategoriaEN', 'categoriasEN_id');
    }
}

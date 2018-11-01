<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelAdministraES extends Model
{
    protected $table = 'administra_ES';
    public function administra()
    {
        return $this->belongsTo('App\ModelAdministra');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelAdministra extends Model
{
    protected $table = 'administra';
    public function administraES(){
         return $this->hasOne('App\ModelAdministraES', 'administraES_id');
    }
    public function administraEN(){
         return $this->hasOne('App\ModelAdministraEN', 'administraEN_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelContacta extends Model
{
    protected $table = 'contacta';
    public function contactaES(){
         return $this->hasOne('App\ModelcontactaES', 'contacta_id');
    }
    public function contactaEN(){
         return $this->hasOne('App\ModelcontactaEN', 'contacta_id');
    }
}

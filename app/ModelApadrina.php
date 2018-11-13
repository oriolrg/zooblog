<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelApadrina extends Model
{
    protected $table = 'apadrina';
    public function apadrinaES()
    {
        return $this->hasOne('App\ModelApadrinaES', 'apadrina_id');
    }
    public function apadrinaEN()
    {
        return $this->hasOne('App\ModelApadrinaEN', 'apadrina_id');
    }
    
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelAdministraEN extends Model
{
    protected $table = 'administra_EN';
    public function administra()
    {
        return $this->belongsTo('App\ModelAdministra');
    }
}

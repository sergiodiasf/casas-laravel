<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    public function tipo() {
        return $this->belongsTo('App\Tipo');
    }

    protected $fillable = array('nome');
}

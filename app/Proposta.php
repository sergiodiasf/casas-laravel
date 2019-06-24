<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
 
class Proposta extends Model
{
    protected $fillable = array('id','nome_cliente', 'email', 'telefone', 'proposta', 'barco_id');

    public function barco() {
        return $this->belongsTo('App\Barco');
    }

    public function setPropostaAttribute($value) {
        $novo1 = str_replace('.', '', $value);
        $novo2 = str_replace(',', '.', $novo1);
        $this->attributes['proposta'] = $novo2;
    }
}

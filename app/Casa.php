<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Casa extends Model
{
    public function tipo() {
        return $this->belongsTo('App\Tipo');
    }

    // define os campos que serão editados na inclusão/alteração 
    // pelos métodos create e update
    protected $fillable = ['modelo', 'tipo_id', 'ano', 'categoria', 
    'tamanho','acompanhamentos','preco','diaria','foto'];

    public function getModeloAttribute($value) {
        return strtoupper($value);
    }

    // retira a máscara com "." e "," antes da inserção 
    public function setPrecoAttribute($value) {
        $novo1 = str_replace('.', '', $value);    // retira o ponto
        $novo2 = str_replace(',', '.', $novo1);   // substitui a , por .
        $this->attributes['preco'] = $novo2;
    }
    
}

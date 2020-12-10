<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'empresas';

    public function cond_iva()
    {
    	return $this->hasOne('App\Iva_condicione', 'id', 'iva_condicione_id');
    }

    public function provincia()
    {
    	return $this->hasOne('App\Provincia', 'id', 'provincia_id');
    }
}

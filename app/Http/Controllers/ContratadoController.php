<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Contratado;

class ContratadoController extends Controller
{
    public function get_contratados_by_clie($user_id)
    {
    	$contratados = new Contratado();
    	//return $contratados->productos();
    	return $contratados->where('user_id', Auth::user()->id)->get();
    }
}

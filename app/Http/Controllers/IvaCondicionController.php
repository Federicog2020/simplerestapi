<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Helpers\JwtAuth;
use App\Iva_condicione;

class IvaCondicionController extends Controller
{
    public function show(Request $request)
	{
	   	$id = $request->input('id_user');

		$condiva = Iva_condicione::all();

		if (!is_null($condiva)) {
			$data = array(
				'status' => 'OK',
				'code' => '200',
				'empresas' => $empresa,
				'message' => 'Los datos se recuperaron correctamente'
			);
		}
		else {
			$data = array(
				'status' => 'error',
				'code' => '400',
				'message' => 'Error al recuperar los datos'
			);
		}

		return response()->json($data, 200);
	}

	/**
	 * [show description]
	 * @param  Request $request [request conteniendo el token de autorización]
	 * @return [type]           [JSON conteniendo los datos de la las condiciones de iva del sistema o en su defecto error]
	 */
	public function getAll(Request $request)
	{
	   	$id = $request->input('id_user');

		$condiva = Iva_condicione::all();

		if (!is_null($condiva)) {
			$data = array(
				'status' => 'OK',
				'code' => '200',
				'condiva' => $condiva,
				'message' => 'Los datos se recuperaron correctamente'
			);
		}
		else {
			$data = array(
				'status' => 'error',
				'code' => '400',
				'message' => 'Error al recuperar los datos'
			);
		}

		return response()->json($data, 200);
	}
}

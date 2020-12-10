<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Helpers\JwtAuth;
use App\Provincia;

class ProvinciaController extends Controller
{
    /**
	 * [show description]
	 * @param  Request $request [request conteniendo el token de autorización]
	 * @return [type]           [JSON conteniendo los datos de las provincias del sistema o en su defecto error]
	 */
	public function getAll(Request $request)
	{
		$provs = Provincia::all();

		if (!is_null($provs)) {
			$data = array(
				'status' => 'OK',
				'code' => '200',
				'provincias' => $provs,
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

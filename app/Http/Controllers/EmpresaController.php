<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Helpers\JwtAuth;
use App\Empresa;
use App\User;

class EmpresaController extends Controller
{
	/**
	 * [show description]
	 * @param  Request $request [request conteniendo el id del usuario de cual se recupera la empresa y el token de autorización]
	 * @return [type]           [JSON conteniendo los datos de la empresa o en su defecto error]
	 */
    public function showAllByUser(Request $request)
	{
		$validator = Validator::make($request->all(), [
            'id_user' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            $data = array(
                'status' => 'error',
                'code' => '400',
                'message' => $validator->messages()->first()
            );
        }
        else {
        	$id = $request->input('id_user');

			$empresa = Empresa::where('user_id', $id)->with('cond_iva')->with('provincia')->get();

			if (!is_null($empresa)) {
				$data = array(
					'status' => 'OK',
					'code' => '200',
					'empresas' => $empresa,
					'message' => 'Las empresas se recuperaron correctamente'
				);
			}
			else {
				$data = array(
					'status' => 'error',
					'code' => '400',
					'message' => 'No existe empresa para este usuario'
				);
			}
        }

		return response()->json($data, 200);
	}

	/**
	 * [show description]
	 * @param  Request $request [request conteniendo el id de la empresa y el token de autorización]
	 * @return [type]           [JSON conteniendo los datos de la empresa o en su defecto error]
	 */
	public function showById(Request $request) {
		$validator = Validator::make($request->all(), [
            'id' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            $data = array(
                'status' => 'error',
                'code' => '400',
                'message' => $validator->messages()->first()
            );
        }
        else {
        	$id = $request->input('id');

			$empresa = Empresa::find($id)->with('cond_iva')->with('provincia')->get();

			if (!is_null($empresa)) {
				$data = array(
					'status' => 'OK',
					'code' => '200',
					'empresas' => $empresa,
					'message' => 'La empresa se recuperó correctamente'
				);
			}
			else {
				$data = array(
					'status' => 'error',
					'code' => '400',
					'message' => 'No existe la empresa consultada'
				);
			}
        }

		return response()->json($data, 200);
	}

	/**
	 * [show description]
	 * @param  Request $request [request conteniendo la información de la empresa a grabar en la base de datos y el token de autorización]
	 * @return [type]           [JSON conteniendo información del éxito o error del proceso]
	 */
	public function store(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'user_id' => 'required|numeric|gt:0',
            'nom_fantasia' => 'required|string|min:1',
            'razon' => 'required|string|min:1',
            'cond_iva_id' => 'required|numeric|gt:0',
            'cuit' => 'required|string|gt:0',
            'fec_inicio' => 'required|date',
            'nro_iibb' => 'required|string',
            'cbu_alias_fce' => 'required|string',
            'email' => 'required|email',
            'telefono' => 'required|string',
            'domicilio' => 'required|string',
            'localidad' => 'required|string',
            'cod_postal' => 'required|string',
            'provincia_id' => 'required|numeric|gt:0'
        ]);

        if ($validator->fails()) {
        	$data = array(
				'status' => 'error',
				'code' => '400',
				'message' => $validator->messages()->first()
			);
        }
        else {
        	//Verificar si existe
        	if (!is_null($emp = Empresa::where('cuit', $request->input('cuit'))->first())) {
        		$data = array(
					'status' => 'error',
					'code' => '400',
					'message' => 'La empresa ya existe'
				);
        	}
        	else { //Guardar el producto
        		$emp = new Empresa();

				$emp->user_id = $request->input('user_id');
				$emp->nom_fantasia = $request->input('nom_fantasia');
				$emp->razon = $request->input('razon');
				$emp->iva_condicione_id = $request->input('cond_iva_id');
				$emp->cuit = $request->input('cuit');
				$emp->fec_inicio = $request->input('fec_inicio');
				$emp->nro_iibb = $request->input('nro_iibb');
				$emp->cbu_alias_fce = $request->input('cbu_alias_fce');
				$emp->email = $request->input('email');
				$emp->telefono = $request->input('telefono');
				$emp->domicilio = $request->input('domicilio');
				$emp->localidad = $request->input('localidad');
				$emp->cod_postal = $request->input('cod_postal');
				$emp->provincia_id = $request->input('provincia_id');

				$emp->save();
	        	
	        	$data = array(
					'status' => 'OK',
					'code' => '200',
					'message' => 'La empresa se agregó correctamente'
				);
        	}
        }

		return response()->json($data, 200);
	}
}

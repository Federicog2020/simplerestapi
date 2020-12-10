<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Helpers\JwtAuth;
use App\User;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:1',
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        if ($validator->fails()) {
            $data = array(
                'status' => 'error',
                'code' => '400',
                'message' => $validator->messages()->first()
            );
        }
        else {
            $email = $request->input('email');
            $name = $request->input('name');
            $password = $request->input('password');

            $user = new User();
            $user->email = $email;
            $user->name = $name;
            $user->password = Hash::make($password);

            //Comprobar usuario duplicado
            $isset_user = User::where('email', $email)->first();

            if (is_null($isset_user) || !isset($isset_user)) { //Guardar el usuario
                $user->save();

                $data = array(
                    'status' => 'OK',
                    'code' => '200',
                    'message' => 'Los datos se guardaron correctamente'
                );
            }
            else { //Ya existe
                $data = array(
                    'status' => 'error',
                    'code' => '400',
                    'message' => 'El usuario '.$isset_user->email.' ya existe'
                );
            }
        }

    	return response()->json($data, 200);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|min:1',
            'password' => 'required|string',
            'gettoken' => 'required|boolean'
        ]);

        if ($validator->fails()) {
            $data = array(
                'status' => 'error',
                'code' => '400',
                'message' => $validator->messages()->first()
            );
        }
        else {
            $credentials = request(['email', 'password']);

            if(!Auth::attempt($credentials)) {
                $data = array(
                    'status' => 'error',
                    'code' => '401',
                    'message' => 'Acceso no autorizado'
                );
            }
            else {
                $user = $request->user();
                $getToken = $request->input('gettoken', false);

                if (is_object($user)) {
                    $jwtAuth = new JwtAuth();

                    $user_data = $jwtAuth->signup($user, $request->input('gettoken'));

                    $data = array(
                        'status' => 'OK',
                        'code' => '200',
                        'data' => $user_data
                    );
                }
            }
        }

    	return response()->json($data, 200);
    }
}

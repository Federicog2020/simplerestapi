<?php
namespace App\Helpers;

use Firebase\JWT\JWT;
use Illuminate\Support\Facades\DB;
use App\User;

/**
 * 
 */
class JwtAuth
{
	public $key;

	public function __construct()
	{
		$this->key = 'secret_api_key_8884747564747*';
	}

	public function signup($user, $getToken = false)
	{
		if (is_object($user)) { //Generar Token y Devolverlo
			$token = array(
				'sub' => $user->id,
				'email' => $user->email,
				'name' => $user->name,
				'iat' => time(),
				'exp' => time() + (7*24*60*60) 
			);

			$jwt = JWT::encode($token, $this->key, 'HS256');

			$decoded = JWT::decode($jwt, $this->key, array('HS256'));

			if ($getToken) {
				return $jwt;
			}
			else {
				return $decoded;
			}
		}
		else {
			return array('status' => 'Error', 'message' => 'Login ha fallado');
		}
	}

	public function checkToken($jwt, $getIdentity = false)
	{
		$auth = false;

		try {
			$decoded = JWT::decode($jwt, $this->key, array('HS256'));

			if (is_object($decoded) && isset($decoded->sub)) {
				$auth = true;
			}

			if ($getIdentity) {
				return $decoded;
			}
		} catch (\UnexpectedValueException $e) {
			//echo $e;
		} catch (\DomainException $e) {
			
		} catch (Exception $e) {
			
		}

		return $auth;
	}

	public function getUser($jwt)
	{
		return JWT::decode($jwt, $this->key, array('HS256'));
	}
}
?>
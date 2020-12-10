<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Helpers\JwtAuth;
use App\Product;

class ProductController extends Controller
{
	public function index(Request $request)
	{
		echo 'Index de car Controller'; die();
	}

	public function show($id, Request $request)
	{
	   	//Guardar el producto
		$product = Product::find($id);

		if (!is_null($product)) {
			$data = array(
				'status' => 'OK',
				'code' => '200',
				'product' => $product,
				'message' => 'El producto se recuperó correctamente'
			);
		}
		else {
			$data = array(
				'status' => 'error',
				'code' => '400',
				'message' => 'El producto no existe'
			);
		}

		return response()->json($data, 200);
	}

	public function store(Request $request)
	{
		/*$hash = $request->header('Authorization', null);

		$jwtAuth = new JwtAuth();

		$user = $jwtAuth->getUser($hash);*/

		$validator = Validator::make($request->all(), [
            'name' => 'required|string|min:1',
            'price' => 'required|numeric|gt:0'
        ]);

        if ($validator->fails()) {
        	$data = array(
				'status' => 'error',
				'code' => '400',
				'message' => $validator->messages()->first()
			);
        }
        else {
        	//Guardar el producto
			$product = new Product();

			$product->name = $request->input('name');
			$product->price = $request->input('price');
			$product->save();
        	
        	$data = array(
				'status' => 'OK',
				'code' => '200',
				'message' => 'El producto se agregó correctamente'
			);
        }

		return response()->json($data, 200);
	}

	public function update($id, Request $request)
	{
		/*$hash = $request->header('Authorization', null);

		$jwtAuth = new JwtAuth();

		$user = $jwtAuth->getUser($hash);*/

		$validator = Validator::make($request->all(), [
            'name' => 'required|string|min:1',
            'price' => 'required|numeric|gt:0'
        ]);

        if ($validator->fails()) {
        	$data = array(
				'status' => 'error',
				'code' => '400',
				'message' => $validator->messages()->first()
			);
        }
        else {
        	//Guardar el producto
			$product = Product::where('id', $id)->update(array('name' => $request->input('name'), 'price' => $request->input('price')));

			var_dump($product);
        	
        	$data = array(
				'status' => 'OK',
				'code' => '200',
				'message' => 'El producto se modificó correctamente'
			);
        }

		return response()->json($data, 200);
	}

	public function destroy($id, Request $request)
	{
		/*$hash = $request->header('Authorization', null);

		$jwtAuth = new JwtAuth();

		$user = $jwtAuth->getUser($hash);*/

	   	//Guardar el producto
		$product = Product::find($id);

		if (!is_null($product)) {
			$product->delete();
    	
	    	$data = array(
				'status' => 'OK',
				'code' => '200',
				'message' => 'El producto se eliminó correctamente'
			);
		}
		else {
			$data = array(
				'status' => 'error',
				'code' => '400',
				'message' => 'El producto no existe'
			);
		}

		return response()->json($data, 200);
	}

	public function getProducts()
	{
		$products = new Product();
		return $products->all();
		/*return view('productos.listado')->with('productos', $products->all()->toArray());*/
	}
}

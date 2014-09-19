<?php

class ProductsController extends \BaseController {

	public function index()
	{
		$products = Product::all();
		return View::make('products.index')->with('products', $products);
	}

	public function edit($id)
	{
		return View::make('products.edit')->with('product', Product::find($id));
	}

	public function update()
	{

		Product::updateProduct(
			array(
				'id' => Input::get('id'),
				'name' => Input::get('name'),
				'description' => Input::get('description'),
				'price' => Input::get('price'),
				'free_shipping' => Input::get('free_shipping')
			)
		);

		return Redirect::to('product');
	}

	public function destroy($id)
	{
		Product::destroy($id);
		return Redirect::to('/product');
	}

}
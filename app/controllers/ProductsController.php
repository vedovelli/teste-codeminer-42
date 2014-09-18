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
		$product = Product::find(Input::get('id'));

		$product->name = Input::get('name');
		$product->description = Input::get('description');
		$product->price = Input::get('price');

		if(Input::has('free_shipping')) {
			$product->free_shipping = Input::get('free_shipping');
		}

		$result = $product->save();

		return Redirect::to('products');

	}

	public function destroy($id)
	{
		Product::destroy($id);
		return Redirect::to('/products');
	}

}
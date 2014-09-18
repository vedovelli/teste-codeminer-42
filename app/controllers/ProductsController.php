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

		Product::_update();
		return Redirect::to('product');
	}

	public function destroy($id)
	{
		Product::destroy($id);
		return Redirect::to('/product');
	}

}
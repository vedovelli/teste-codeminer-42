<?php

class ProductsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /products
	 *
	 * @return Response
	 */
	public function index()
	{
		$products = Product::all();
		return View::make('products.index')->with('products', $products);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /products/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return View::make('products.edit')->with('product', Product::find($id));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /products/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
		$product = Product::find(Input::get('id'));
		$product->name = Input::get('name');
		$product->description = Input::get('description');
		$product->price = str_replace(',', '', Input::get('price'));

		if(Input::has('free_shipping')) {
			$product->free_shipping = Input::get('free_shipping');
		}

		$result = $product->save();

		return Redirect::to('products');

	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /products/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Product::destroy($id);
		return Redirect::to('/products');
	}

}
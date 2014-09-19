<?php

class ProductsController extends \BaseController {

	private $repo;

	public function __construct(IProductRepository $repo) {
		$this->repo = $repo;
	}

	public function index()
	{
		$products = $this->repo->listProducts('updated_at', 'DESC');
		return View::make('products.index')->with('products', $products);
	}

	public function edit($id)
	{
		$product = $this->repo->getProduct($id);

		if(is_null($product)) {

			return Redirect::to('product')->with('message', 'Produto não encontrado');
		} else {

			return View::make('products.edit')->with('product', $product);
		}
	}

	public function update()
	{

		$this->repo->updateProduct(
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
		$this->repo->destroyProduct($id);
		return Redirect::to('/product');
	}

}
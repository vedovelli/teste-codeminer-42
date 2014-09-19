<?php

class ProductRepository implements IProductRepository {

	public function listProducts($column_to_order_by, $direction) {

		return Product::orderBy($column_to_order_by, $direction)->get();
	}

	public function updateProduct($product_data) {

		$product = Product::find($product_data['id']);

		$product->name = $product_data['name'];
		$product->description = $product_data['description'];
		$product->price = $product_data['price'];

		if(is_null($product_data['free_shipping'])) {
			$product->free_shipping = 0;
		} else {
			$product->free_shipping = 1;
		}

		return $product->save();
	}

	public function destroyProduct($product_id) {

		Product::destroy($product_id);
	}

}
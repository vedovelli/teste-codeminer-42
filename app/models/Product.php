<?php

class Product extends Eloquent {

	protected $fillable = array('lm', 'name', 'free_shipping', 'description', 'price', 'category');

	public static function updateProduct($input) {

		$product = Product::find($input['id']);

		$product->name = $input['name'];
		$product->description = $input['description'];
		$product->price = $input['price'];

		if(is_null($input['free_shipping'])) {
			$product->free_shipping = 0;
		} else {
			$product->free_shipping = 1;
		}

		return $product->save();

	}

}
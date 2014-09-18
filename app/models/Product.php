<?php

class Product extends Eloquent {

	protected $fillable = array('lm', 'name', 'free_shipping', 'description', 'price', 'category');

	public static function _update() {

		$product = Product::find(Input::get('id'));

		$product->name = Input::get('name');
		$product->description = Input::get('description');
		$product->price = Input::get('price');

		if(Input::has('free_shipping')) {
			$product->free_shipping = Input::get('free_shipping');
		}

		return $product->save();

	}

}
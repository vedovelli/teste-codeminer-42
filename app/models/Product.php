<?php

class Product extends Eloquent {

	protected $fillable = array('lm', 'name', 'free_shipping', 'description', 'price', 'category');

}
<?php

interface IProductRepository {

	public function listProducts($column_to_order_by, $direction);

	public function updateProduct($product_data);

	public function destroyProduct($product_id);

}
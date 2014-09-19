<?php

class ProductTest extends TestCase {

	/** @test */
	public function it_gets_to_destination() {

		$this->call('GET', 'product');

		$this->assertResponseOk();

	}

	/** @test */
	public function it_has_product_list() {

		$this->call('GET', 'product');

		$this->assertViewHas('products');

	}

}
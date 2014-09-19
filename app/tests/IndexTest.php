<?php

class IndexTest extends TestCase {

	/** @test */
	public function it_redirects_to_products() {

		$this->call('GET', '/');

		$this->assertRedirectedTo('product');

	}

}
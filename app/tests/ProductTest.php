<?php

class ProductTest extends TestCase {

	/** @test */
	public function it_gets_to_destination() {

		$this->call('GET', 'product');

		$this->assertResponseOk();

	}

	/** @test */
	public function product_management() {

		// Acessa a funcionalidade produtos e retorna a representação do DOM da página
		$crawler = $this->client->request('GET', 'product');

		// Verifica se existe uma variável chamada 'products'
		$this->assertViewHas('products');


		// Verifica se a lista de produtos contém produtos ao checar a existência dos botões de gerenciamento
		$link_editar = $crawler->filter('a.link-editar');
		$link_remover = $crawler->filter('a.link-remover');

		$this->assertGreaterThan(0, count($link_editar), 'Nenhum botao editar encontrado!');
		$this->assertGreaterThan(0, count($link_remover), 'Nenhum botao remover encontrado!');

		// Se a lista está preenchida
		if(count($link_editar) > 0) {

			// Pega o link do primeiro botão editar
			$url_editar = $link_editar->first()->attr('href');

			// Acessa a funcionalidade product/edit/{id} e retorna a representação do DOM da página
			$crawler = $this->client->request('GET', $url_editar);

			// Verifica se o status retornado é 200
			$this->assertResponseOk();

			// Pega o ID do produto ao ler o valor do hidden field do form
			$product_id = $crawler->filter('input[name=id]')->attr('value');

			// Cria nova instancia do repositório de produtos
			$productRepo = new ProductRepository;

			// Atualiza o produto
			$update_result = $productRepo->updateProduct(
				array(
					'id' => $product_id,
					'name' => 'Product Name',
					'description' => 'Product Description',
					'price' => '2.456,89',
					'free_shipping' => 1
				)
			);

			// Certifica-se de que a atualização foi feita com sucesso
			$this->assertTrue($update_result);

		}

		// Se a lista está preenchida
		if(count($link_remover) > 0) {

			// Pega o link do primeiro botão remover
			$url_remover = $link_remover->first()->attr('href');

			// Acessa o link
			$this->call('GET', $url_remover);

			// Verifica se é redirecionado para a lista de produtos
			$this->assertRedirectedTo('product');
		}

	}

}
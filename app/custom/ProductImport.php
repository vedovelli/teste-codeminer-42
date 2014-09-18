<?php

class ProductImport {

	public function doIt($path, $name) {

		// Adiciona a tarefa de leitura do arquivo e criação dos registros no banco de dados à fila
		Queue::push(function($job) use ($path, $name)	{

			Product::truncate(); // Limpa a tabela, evitando assim itens duplicados

			$reader = Excel::selectSheetsByIndex(0)->load($path.'/'.$name); // Le o arquivo Excel

			$reader->each(function($sheet) { // Faz o loop nas linhas que contém conteúdo

				$product = array();
				$product['lm'] = $sheet->lm;
				$product['name'] = $sheet->name;
				$product['free_shipping'] = $sheet->free_shipping;
				$product['description'] = $sheet->description;
				$product['price'] = number_format((float) $sheet->price, 2, ',', '.');
				$product['category'] = $sheet->category;

				// Cria um novo produto baseado nas informações obtidas no arquivo Excel
				Product::create($product);

			});

			$job->delete(); // Remove job from Queue

		});
	}
}
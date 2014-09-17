<?php

class FileController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('files.index');
	}


	/**
	 * Manages the file upload action.
	 *
	 * @return Response
	 */
	public function upload()
	{

		$file = Input::file('planilha'); // Pega a referência ao arquivo enviado
		$name = $file->getClientOriginalName(); // Guarda o nome do arquivo
		$extension = $file->getClientOriginalExtension(); // Guarda a extensão do arquivo
		$path = storage_path().'/import'; // Determina onde o arquivo será salvo

		if($file->isValid()){ // Se o arquivo for válido

			if($extension == 'xls' || $extension == 'xlsx'){ // Verifica se é um arquivo Excel

				$file->move($path, $name); // Salva o arquivo em disco

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
						$product['price'] = $sheet->price;
						$product['category'] = $sheet->category;

						// Cria um novo produto baseado nas informações obtidas no arquivo Excel
						Product::create($product);

					});

				});

				// Redireciona para a tela anterior com mensagem de sucesso!
				return Redirect::to('file')->with('message', 'Arquivo enviado com sucesso!');
			} else {

				// Redireciona para a tela anterior com mensagem indicando que o arquivo enviado não é Excel
				return Redirect::to('file')->with('message', 'O arquivo precisa ser uma planilha de Excel.');
			}

		} else {

			// Redireciona para a tela anterior indicando falha no upload do arquivo!
			return Redirect::to('file')->with('message', 'Falha no envio do arquivo.');
		}
	}
}
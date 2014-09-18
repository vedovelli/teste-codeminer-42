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

				$product_import = new ProductImport; // Instancia a classe que contem o método responsável por processar o arquivo
				$product_import = $product_import->doIt($path, $name); // Faz a importação

				// Redireciona para a tela anterior com mensagem de sucesso!
				return Redirect::to('file')->with('message-success', 'Arquivo enviado com sucesso! <small>[ <a href="/product">ver produtos</a> ]</small>');
			} else {

				// Redireciona para a tela anterior com mensagem indicando que o arquivo enviado não é Excel
				return Redirect::to('file')->with('message-fail', 'O arquivo precisa ser uma planilha de Excel.');
			}

		} else {

			// Redireciona para a tela anterior indicando falha no upload do arquivo!
			return Redirect::to('file')->with('message-fail', 'Falha no envio do arquivo.');
		}
	}
}
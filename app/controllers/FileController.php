<?php

class FileController extends \BaseController {

	private $repo;

	public function __construct(IProductUploadRepository $repo) {
		$this->repo = $repo;
	}

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

		$uploadStatus = $this->repo->upload($file);

		switch($uploadStatus) {
			case 0:
				return Redirect::to('file')->with('message-success', 'Arquivo enviado com sucesso! <small>[ <a href="/product">ver produtos</a> ]</small>');
				break;
			case 1:
				return Redirect::to('file')->with('message-fail', 'O arquivo precisa ser uma planilha de Excel.');
				break;
			case 2:
				return Redirect::to('file')->with('message-fail', 'Falha no envio do arquivo.');
				break;
		}


	}
}
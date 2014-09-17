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

		$file = Input::file('planilha');
		$name = $file->getClientOriginalName();
		$extension = $file->getClientOriginalExtension();
		$path = storage_path().'/import';

		if($file->isValid()){

			if($extension == 'xls' || $extension == 'xlsx'){

				$file->move($path, $name);
				$this->createProductsFromExcel($path, $name);
				return Redirect::to('file')->with('message', 'Arquivo enviado com sucesso!');
			} else {

				return Redirect::to('file')->with('message', 'O arquivo precisa ser uma planilha de Excel.');
			}

		} else {

			return Redirect::to('file')->with('message', 'Falha no envio do arquivo.');
		}
	}

	private function createProductsFromExcel($path, $name) {

		Product::truncate();

		$reader = Excel::selectSheetsByIndex(0)->load($path.'/'.$name);

		$reader->each(function($sheet) {

			$product = array();
			$product['lm'] = $sheet->lm;
			$product['name'] = $sheet->name;
			$product['free_shipping'] = $sheet->free_shipping;
			$product['description'] = $sheet->description;
			$product['price'] = $sheet->price;
			$product['category'] = $sheet->category;

			Product::create($product);

		});
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}

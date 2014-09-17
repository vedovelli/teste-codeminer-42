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
		if(
			Input::file('planilha')->isValid() &&
			(
				Input::file('planilha')->getClientOriginalExtension() == 'xls' ||
				Input::file('planilha')->getClientOriginalExtension() == 'xlsx'
			)
		){

			$result = Input::file('planilha')->move(storage_path().'/import', Input::file('planilha')->getClientOriginalName());
			return Redirect::to('file')->with('message', 'Arquivo enviado com sucesso!');
		} else {

			return Redirect::to('file')->with('message', 'Falha no envio do arquivo.');
		}
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

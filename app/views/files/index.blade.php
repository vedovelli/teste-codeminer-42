@extends('layouts.master')

@section('content')

	@if(Session::get('message'))
		<div class="message">{{Session::get('message')}}</div>
	@endif

	{{Form::open(array('url'=>'/file/upload', 'files'=> true))}}

	{{Form::label('planilha', 'Selecione a planilha a ser importada')}}
	{{Form::file('planilha')}}
	{{Form::submit('Enviar')}}

	{{Form::close()}}

@stop
@extends('layouts.master')

@section('content')

	@if(Session::get('message'))
		<div class="message">{{Session::get('message')}}</div>
	@endif

	{{Form::open(array('url'=>'/file/upload', 'files'=> true))}}

	{{Form::file('planilha')}}
	{{Form::label('planilha', 'Selecione a planilha a ser importada')}}
	<br>{{Form::submit('Enviar')}}
	<div class="warning"><strong>Atenção</strong>: todos os produtos atualmente armazenados serão removidos antes para dar lugar aos novos produtos</div>

	{{Form::close()}}

@stop
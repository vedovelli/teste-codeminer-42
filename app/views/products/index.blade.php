@extends('layouts.master')

@section('content')

@if(Session::get('message'))
	<div class="alert alert-success">{{Session::get('message')}}</div>
@endif

<table class="table">
	<theader>
		<tr>
			<th>ID</th>
			<th>Nome</th>
			<th class="text-center">Frete Grátis?</th>
			<th class="text-right">Preço</th>
			<th>Categoria</th>
			<th colspan="2" class="text-center">Gerenciamento</th>
		</tr>
	</theader>
	<tbody>
	@foreach($products as $product)
		<tr>
			<td>{{{$product->id}}}</td>
			<td title="{{{$product->description}}}">{{{$product->name}}}</td>
			<td class="text-center">{{{$product->free_shipping == 1 ? 'Sim':'Não'}}}</td>
			<td class="text-right">R$ {{{$product->price}}}</td>
			<td>{{{$product->category}}}</td>
			<td class="text-center" width="1%">
				<a href="/product/edit/{{{$product->id}}}" class="btn btn-primary btn-xs link-editar">editar</a>
			</td>
			<td class="text-center" width="1%">
				<a href="/product/remove/{{{$product->id}}}" class="btn btn-danger btn-xs link-remover">remover</a>
			</td>
		</tr>
	@endforeach
	</tbody>
</table>

<p><a id="import_button" href="/file" class="btn btn-default">Importar Produtos</a></p>
@stop
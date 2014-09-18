@extends('layouts.master')

@section('content')

{{Form::open(array('url'=>'/products/update'))}}
	<input type="hidden" name="id" value="{{{$product->id}}}">
  <div class="form-group">
    <label for="product_name">Nome</label>
    <input type="text" name="name" class="form-control" id="product_name" placeholder="Nome do produto é obrigatório" value="{{{$product->name}}}">
  </div>
  <div class="form-group">
    <label for="product_description">Descrição</label>
    <input type="text" name="description" class="form-control" id="product_description" placeholder="Descrição do produto é obrigatória" value="{{{$product->description}}}">
  </div>
  <div class="row">

		<div class="col-xs-2">
			<div class="form-group">
				<label for="product_price">Preço <small>formato: 1245.99</small></label>
				<div class="input-group">
					<div class="input-group-addon">R$</div>
					<input type="text" name="price" class="form-control" id="product_price" placeholder="Preço do produto é obrigatório" value="{{{$product->price}}}">
				</div>
			</div>
		</div>

		<div class="col-xs-2">
		  <div class="checkbox">
		    <label style="margin-top: 22px">
		      <input type="checkbox" name="free_shipping" value="1" {{{$product->free_shipping == 1 ? 'checked="checked"' : ''}}}> Frete grátis
		    </label>
		  </div>
		</div>

	</div>

  <button type="submit" class="btn btn-default">Salvar</button> <small>ou <a href="/products">voltar</a></small>
{{ Form::close() }}
@stop
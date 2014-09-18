@extends('layouts.master')

@section('content')

{{Form::open(array('url'=>'/product/update'))}}


	{{Form::hidden('id', $product->id)}}

  <div class="form-group">
    <label for="product_name">Nome</label>
    {{Form::text('name', $product->name, array('class' => 'form-control', 'id' => 'product_name','placeholder' => 'Nome do produto é obrigatório'))}}
  </div>

  <div class="form-group">
    <label for="product_description">Descrição</label>
  	{{Form::text('description', $product->description, array('class' => 'form-control', 'id' => 'product_description','placeholder' => 'Descrição do produto é obrigatória'))}}
  </div>

  <div class="row">

		<div class="col-xs-2">
			<div class="form-group">
				<label for="product_price">Preço <small>formato: 1245.99</small></label>
				<div class="input-group">
					<div class="input-group-addon">R$</div>
					{{Form::text('price', $product->price, array('class' => 'form-control', 'id' => 'product_price','placeholder' => 'Preço do produto é obrigatório'))}}
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

  <button type="submit" class="btn btn-default">Salvar</button> <small>ou <a href="/product">voltar</a></small>

{{ Form::close() }}
@stop
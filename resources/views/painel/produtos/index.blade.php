@extends('painel.templates.template')

@section('content')

	<h1 class="title-pg">Listagem dos Produtos</h1>
	<a href="{{route('produtos.create')}}" class="btn btn-primary btn-add">
		Cadastrar
	</a>
	<table class="table table-striped">
		<tr>
			<th>Nome</th>
			<th>Descrição</th>
			<th width="100px">Ações</th>
		</tr>
		@foreach($produtos as $produto)
		<tr>
			<td>{{$produto->name}}</td>
			<td>{{$produto->description}}</td>
			<td >
				<a href="{{route('produtos.edit',$produto->id)}}" class="edit actions">
					<span class="glyphicon glyphicon-pencil"></span>
				</a>
				<a href="{{route('produtos.create')}}" class="delete actions">
					<span class="glyphicon glyphicon-trash"></span>
				</a>
			</td>
		</tr>
		@endforeach
	</table>

@endsection
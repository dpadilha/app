@extends('painel.templates.template')

@section('content')

	<h1 class="title-pg"><a href={{route('produtos.index')}}><span class="glyphicon glyphicon-fast-backward"></span></a> Produto: <b>{{$produto->name}}</b>
		
	</h1>
	<p><b>Ativo:</b>{{$produto->active}}</p>
	<p><b>Número:</b>{{$produto->number}}</p>
	<p><b>Categoria:</b>{{$produto->category}}</p>
	<p><b>Descrição:</b>{{$produto->description}}</p>
	{!! Form::open(['route' => ['produtos.destroy', $produto->id], 'method' => 'delete']) !!}
		{!!Form::submit("Deletar Produto: $produto->name", ['class' => 'btn btn-danger'])!!}
	{!!Form::close()!!}

@endsection
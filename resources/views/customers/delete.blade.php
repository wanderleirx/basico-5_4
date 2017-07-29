@extends('layouts.main')

@section('page-title')
	| Deletando Clientes
@stop

@section('content')

	@if(count($errors->all()) > 0)
		<div class="alert alert-danger">
			<ul>
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

	@if(Session::has('success'))
		<div class="alert-success">
			{{ Session::get('success') }}
		</div>
	@endif

	@if(isset($_GET['id']))
		<div class="row">
			<h3>Deseja excluir o cliente: <strong></strong></h3>	
		</div>
	@endif
@stop


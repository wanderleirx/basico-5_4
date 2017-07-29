@extends('layouts.main')

@section('page-title')
	| Gerenciamento de Clientes
@stop

@section('content')
	
	@if(Session::has('success'))
		<div class="alert-success">
			{{ Session::get('success') }}
		</div>
	@endif

	<div class="row">
		<a href="{{ route('clientes.create') }}" class="btn btn-primary">Novo cliente</a>
	</div>
	<br>
	<div class="row">
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>Id</th>
					<th>Nome</th>
					<th>Cidade/Estado</th>
					<th>Nacimento</th>
					<th>Cliente Especial</th>
					<th colspan="2" align="center">Ações</th>
				</tr>
			</thead>
			<tbody>
				@foreach($customers as $customer)
				<tr>
					<td>{{ $customer->id }}</td>
					<td>{{ $customer->name }}</td>
					<td>{{ $customer->city }} - {{ $customer->state }}</td>
					<td>{{ $customer->birthdate }}</td>
					<td style="text-align: center;">
						@if($customer->special_customer)
							<i class="material-icons">check</i>
						@else 
							<i class="material-icons">clear</i>
						@endif
					</td>
					<td>
						<a href="{{ route('clientes.edit', $customer->id) }}" class="btn btn-xs btn-success">Editar</a>
					</td>
					<td>
						{!! Form::open(['route' => ['clientes.destroy', 'cliente' => $customer->id]]) !!}
						<input type="hidden" name="_method" value="DELETE">
						<button type="submit" class="btn btn-xs btn-danger">Excluir</button>
						{!! Form::close() !!}
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@stop
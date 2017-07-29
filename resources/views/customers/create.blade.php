@extends('layouts.main')

@section('page-title')
	| Editando Clientes
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

	{!! Form::model($customer, ['route' => ['clientes.store']]) !!}
	@include('customers.partials.form')
	{!! Form::close() !!}
@stop


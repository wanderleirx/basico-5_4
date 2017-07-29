<div class="row">
	<div class="col l6">
		<div class="form-group">
			{!! Form::label('name', 'Nome', array('class' => 'control-label')) !!}
			{!! Form::text('name', null, ['class' => 'form-control']) !!}
		</div>
	</div>

	<div class="col l6">
		<div class="form-group">
			{!! Form::label('city', 'Cidade', array('class' => 'control-label')) !!}
			{!! Form::text('city', null, ['class' => 'form-control']) !!}
		</div>
	</div>

	<div class="col l6">
		<div class="form-group">
			{!! Form::label('birthdate', 'Data de Nascimento', array('class' => 'control-label')) !!}
			{!! Form::date('birthdate', null, ['class' => 'form-control']) !!}
		</div>
	</div>

	<div class="col l6">
		<div class="form-group">
			{!! Form::label('state', 'Estado', array('class' => 'control-label')) !!}
			{!! Form::select('state', $customersForSelect, null, ['class' => '']) !!}
		</div>
	</div>

	<div class="col l6">
		<div class="">
			 {!! Form::checkbox('special_customer', 1, null, ['id' => 'special_customer']) !!} 
			{!! Form::label('special_customer', 'Cliente especial?', array('class' => 'control-label')) !!} 
					
		</div>
	</div>

</div>

<button type="submit" class="btn btn-primary">Salvar</button>
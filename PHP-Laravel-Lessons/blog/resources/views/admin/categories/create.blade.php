@extends("admin.template.main")

@section('title', 'Agregar Categoría')

@section('content')

	{{-- Creacion de formulario --}}
	{!! Form::open(['route'=>'categories.store', 'method'=>'POST']) !!}
		<div class="form-group">
			{!! Form::label('name', 'Nombre') !!}
			{!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Nombre categoria', 'required']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::submit('Registrar', ['class'=>'btn btn-primary']) !!}
		</div>

	{!! Form::close() !!}

@endsection
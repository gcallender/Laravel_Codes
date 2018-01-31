@extends("admin.template.main")

@section('title', 'Editar Categoría ' . $category->name)

@section('content')

	{{-- Creacion de formulario --}}
	{!! Form::open(['route'=>['categories.update', $category], 'method'=>'PUT']) !!}
		<div class="form-group">
			{!! Form::label('name', 'Nombre') !!}
			{!! Form::text('name', $category->name, ['class'=>'form-control', 'placeholder'=>'Nombre categoria', 'required']) !!}
		</div>

		<div class="form-group">
			{!! Form::submit('Actualizar', ['class'=>'btn btn-primary']) !!}
		</div>

	{!! Form::close() !!}

@endsection
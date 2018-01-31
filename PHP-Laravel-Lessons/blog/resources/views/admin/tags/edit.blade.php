@extends("admin.template.main")

@section('title', 'Editar Tag ' . $tag->name)

@section('content')

	{{-- Creacion de formulario --}}
	{!! Form::open(['route'=>['tags.update', $tag], 'method'=>'PUT']) !!}
		<div class="form-group">
			{!! Form::label('name', 'Nombre') !!}
			{!! Form::text('name', $tag->name, ['class'=>'form-control', 'placeholder'=>'Nombre del tag', 'required']) !!}
		</div>

		<div class="form-group">
			{!! Form::submit('Actualizar', ['class'=>'btn btn-primary']) !!}
		</div>

	{!! Form::close() !!}

@endsection
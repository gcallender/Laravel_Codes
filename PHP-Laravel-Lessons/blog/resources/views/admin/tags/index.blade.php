@extends("admin.template.main")

@section('title', 'Lista de Tags')

@section('content')

	{{-- Enlace a otra ruta --}}
	<a href="{{ url("admin/tags/create") }}" class="btn btn-info">Registrar nuevo tag</a>

	<!-- Buscador de tags -->
	{!! Form::open(['route'=>'tags.index', 'method'=>'GET', 'class'=>'form-inline float-right']) !!}
		<div class="form-group">
			{!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Buscar ...', 
				'aria-decribedby'=>'search']) !!}
			{!! Form::submit('Buscar', ['class'=>'btn btn-primary']) !!}
		</div>
	{!! Form::close() !!}

	<hr>
	<!-- Tabla o Lista de tags -->
	<table class="table table-striped">
		<thead>
			<th>ID</th>
			<th>Nombre</th>
			<th>Acción</th>
		</thead>
		<tbody>
			@foreach ($tags as $tag)
				<tr>
					<td>{{ $tag->id }} </td>
					<td>{{ $tag->name }} </td>	
					<td><a href="{{ url('admin/tags/' . $tag->id . '/edit') }}" class="btn btn-warning">Edit</a>
						<a href="{{ url('admin/tags/' . $tag->id . '/destroy') }}" class="btn btn-danger" onclick="return confirm('Seguro que desea eliminar ?');">Delete</a>
						</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	
	{{-- Paginacion --}}
	{!! $tags->links() !!}

@endsection
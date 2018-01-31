@extends("admin.template.main")

@section('title', 'Lista de Categorías')

@section('content')

	{{-- Enlace a otra ruta --}}
	<a href="{{ url("admin/categories/create") }}" class="btn btn-info">Registrar nueva categoría</a>
	<br><br>

	<table class="table table-striped">
		<thead>
			<th>ID</th>
			<th>Nombre</th>
			<th>Acción</th>
		</thead>
		<tbody>
			@foreach ($categories as $category)
				<tr>
					<td>{{ $category->id }} </td>
					<td>{{ $category->name }} </td>	
					<td><a href="{{ url('admin/categories/' . $category->id . '/edit') }}" class="btn btn-warning">Edit</a>
						<a href="{{ url('admin/categories/' . $category->id . '/destroy') }}" class="btn btn-danger" onclick="return confirm('Seguro que desea eliminar ?');">Delete</a>
						</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	{{-- Paginacion --}}
	{{-- {!! $users->render() !!} --}}
	{!! $categories->links() !!}

@endsection
@extends("admin.template.main")

@section('title', 'Articulos')

@section('content')

	{{-- Enlace a otra ruta --}}
	<a href="{{ url("admin/articles/create") }}" class="btn btn-info">Crear un nuevo articulo</a>
	
	<hr>

	<table class="table table-striped">
		<thead>
			<th>ID</th>
			<th>Title</th>
			<th>User ID</th>
			<th>Category ID</th>
			<th>Contenido</th>
			<th>Acción</th>
		</thead>
		<tbody>
			@foreach ($articles as $article)
				<tr>
					<td>{{ $article->id }} </td>
					<td>{{ $article->title }} </td>
					<td>{{ $article->user_id }} </td>
					<td>{{ $article->category_id }} </td>
					<td>{{ $article->content }} </td>
					<td><a href="{{ url('admin/articles/' . $article->id . '/edit') }}" class="btn btn-warning">Edit</a>
						<a href="{{ url('admin/articles/' . $article->id . '/destroy') }}" class="btn btn-danger" onclick="return confirm('Seguro que desea eliminar ?');">Delete</a>
						</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	{{-- Paginacion --}}
	{{-- {!! $users->render() !!} --}}
	{!! $articles->links() !!}

@endsection
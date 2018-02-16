@extends("admin.template.main")

@section('title', 'Articulos')

@section('content')

	{{-- Enlace a otra ruta --}}
	<a href="{{ url("admin/articles/create") }}" class="btn btn-info">Crear un nuevo articulo</a>
	
	<!-- Buscador de articulos -->
	{!! Form::open(['route'=>'articles.index', 'method'=>'GET', 'class'=>'form-inline float-right']) !!}
		<div class="form-group">
			{!! Form::text('title', null, ['class'=>'form-control', 'placeholder'=>'Buscar ...', 
				'aria-decribedby'=>'search']) !!}
			{!! Form::submit('Buscar', ['class'=>'btn btn-primary']) !!}
		</div>
	{!! Form::close() !!}

	<hr>
	
	<!-- Lista de articulo -->
	<table class="table table-striped">
		<thead>
			<th>ID</th>
			<th>Title</th>
			<th>Category</th>
			<th>User</th>			
			<th>Action</th>
		</thead>
		<tbody>
			@foreach ($articles as $article)
				<tr>
					<td>{{ $article->id }} </td>
					<td>{{ $article->title }} </td>
					<td>{{ $article->category->name }} </td>
					<td>{{ $article->user->name }} </td>
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
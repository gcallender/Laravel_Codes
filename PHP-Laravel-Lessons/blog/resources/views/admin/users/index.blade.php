@extends("admin.template.main")

@section('title', 'Lista de Usuarios')

@section('content')

	{{-- Enlace a otra ruta --}}
	<a href="{{ url("admin/users/create") }}" class="btn btn-info">Registrar nuevo usuario</a>
	<br><br>

	<table class="table table-striped">
		<thead>
			<th>ID</th>
			<th>Nombre</th>
			<th>Correo</th>
			<th>Tipo</th>
			<th>Acción</th>
		</thead>
		<tbody>
			@foreach ($users as $user)
				<tr>
					<td>{{ $user->id }} </td>
					<td>{{ $user->name }} </td>
					<td>{{ $user->email }} </td>
					<td>
						@if ($user->type == "admin")
							<span class="badge badge-danger">{{ $user->type }}</span>
						@else
							<span class="badge badge-primary">{{ $user->type }}</span>
						@endif
						</td>
					<td><a href="{{ url('admin/users/' . $user->id . '/edit') }}" class="btn btn-warning">Edit</a>
						<a href="{{ url('admin/users/' . $user->id . '/destroy') }}" class="btn btn-danger" onclick="return confirm('Seguro que desea eliminar ?');">Delete</a>
						</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	{{-- Paginacion --}}
	{{-- {!! $users->render() !!} --}}
	{!! $users->links() !!}	

@endsection
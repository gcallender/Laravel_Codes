@extends("admin.template.main")

@section('title', 'Agregar Artículo')

@section('content')

	{{-- Creacion de formulario --}}
	{!! Form::open(['route'=>'articles.store', 'method'=>'POST', 'files'=>true]) !!}
		<div class="form-group">
			{!! Form::label('title', 'Título') !!}
			{!! Form::text('title', null, ['class'=>'form-control', 
				'placeholder'=>'Nombre del artículo', 'required']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('category_id', 'Categoría') !!}
			{!! Form::select('category_id', $categories, null, 
				['class'=>'form-control select-category', 'placeholder'=>'', 'required']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('content', 'Contenido') !!}
			{!! Form::textarea('content', null, ['class'=>'form-control textarea-content', 
				'placeholder'=>'Contenido ...', 'required']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('tags', 'Tags') !!}
			{!! Form::select('tags[]', $tags, null, 
				['class'=>'form-control select-tag', 'multiple', 'required']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('image', 'Imagen') !!}
			<br>
			{!! Form::file('image') !!}
		</div>
		
		<div class="form-group">
			{!! Form::submit('Agregar artículo', ['class'=>'btn btn-primary']) !!}
		</div>

	{!! Form::close() !!}

@endsection

@section('js')
	<script>
		$(".select-tag").chosen({
			placeholder_text_multiple: "Seleccione un máximo de 3 tags ...",
			max_selected_options: 3,
			search_contains: true,
		});

		$(".select-category").chosen({				
			search_contains: true,
			placeholder_text_single: "Seleccione una categoria ...",
		});		

		$('.textarea-content').trumbowyg({
			resetCss: true,
			autogrow: true,
		});

	</script>
@endsection

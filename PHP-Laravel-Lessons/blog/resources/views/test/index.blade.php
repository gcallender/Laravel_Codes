<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>{{ $article->title }}</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/general.css') }} ">
</head>
<body>
	{{-- Comentarios --}} 
	{{-- Modo Blade --}} 

	{{ $article->title }}

	@for($i = 0; $i < 5; $i++)
		{{ $i }}
	@endfor

	<hr>
	<br>
	<h1>{{ $article->title }}</h1>
	<hr>
	{{ $article->content }}
	<hr>
	{{ $article->user->name }} |
	{{ $article->category->name }} |
	
	@foreach($article->tags as $tag)
		{{ $tag->name }}
	@endforeach

	<?php 
	/*
	echo "<p>
	El titulo del articulo es: $prueba->title.
	</p>";
	*/
	 ?>
</body>
</html>


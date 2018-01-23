<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class TestController extends Controller
{
    public function view($id) {
    	$article = Article::find($id);
    	// Establecer las relaciones
		$article->category;
		$article->user;
		$article->tags;
		// Visualizar
		//dd($article);

		// Retorno de valor modo vista
		return view('test/index', ['article'=>$article]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Tag;
use App\Article;
use App\Image;
use App\Http\Requests\ArticleRequest;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Incorporacion de Scope para busquedas desde el modelo
        $articles = Article::search($request->title)->orderBy('id', 'ASC')->paginate(4);
        // Llamada de relaciones
        $articles->each(function($articles) {
            $articles->category;
            $articles->user;
        });
        //dd($articles);

        return view("admin/articles/index")->with('articles', $articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('name', 'ASC')->pluck('name', 'id');
        //dd($categories);
        $tags = Tag::orderBy('name', 'ASC')->pluck('name', 'id');

        return view("admin/articles/create")
            ->with('categories', $categories)
            ->with('tags', $tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        //dd($request->tags);

        $article = new Article($request->all());
        $article->user_id = \Auth::user()->id;
        //dd($article);
        $article->save();

        // Manipulacion de imagenes
        if ($request->file("image")) {
            $file = $request->file("image");
            $name = "blogImage_" . time() . "." . $file->getClientOriginalExtension();
            //dd($name);
            $path = public_path() . "/images/articles/";
            $file->move($path, $name);

            $image = new Image();
            // Asociar ID del articulo a la imagen
            $image->article()->associate($article);
            $image->name = $name;
            $image->save();
        }

        // Rellenar tabla pivote -> article_tag
        $article->tags()->sync($request->tags);

        Flash("Se ha creado el articulo \"" . $article->title . "\" de forma satisfactoria !")->important();

        return redirect(url("admin/articles"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

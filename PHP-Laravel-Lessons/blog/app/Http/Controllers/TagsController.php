<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Http\Requests\TagRequest;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$tags = Tag::orderBy('id', 'ASC')->paginate(4);

        // Incorporacion de Scope
        $tags = Tag::search($request->name)->orderBy('id', 'ASC')->paginate(4);

        return view("admin/tags/index")->with('tags', $tags);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin/tags/create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagRequest $request)
    {
        $tag = new Tag($request->all());
        $tag->save();

        Flash("El tag " . $tag->name . " ha sido creado con éxito")->important();

        return redirect(url("admin/tags"));
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
        $tag = Tag::find($id);

        return view("admin/tags/edit")->with('tag', $tag);
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
        $tag = Tag::find($id);
        $tag->fill($request->all());
        $tag->save();

        Flash("El tag " . $tag->name . " se ha actualizado con éxito")->warning()->important();

        return redirect(url("admin/tags"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::find($id);
        $tag->delete();

        Flash("Se ha eliminado el tag \"" . $tag->name . "\" con éxito")->error()->important();

        return redirect(url("admin/tags"));
    }
}

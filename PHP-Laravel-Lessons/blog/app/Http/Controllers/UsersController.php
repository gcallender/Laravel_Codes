<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UserRequest;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'ASC')->paginate(4);

        return view("admin/users/index")->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin/users/create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        //dd($request->all());
        $user = new User($request->all());
        $user->password = bcrypt($request->password);
        //dd($user);
        $user->save();
        //dd("Usuario creado");

        Flash("Se ha registrado " . $user->name . " de forma exitosa!")->important();

        return redirect(url("admin/users"));
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
        $user = User::find($id);

        return view("admin/users/edit")->with('user', $user);
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
        //dd($id);
        //dd($request->all());
        $user = User::find($id);
        // Forma 1
        //$user->name = $request->name;
        //$user->email = $request->email;        
        //$user->type = $request->type;
        // Forma 2
        $user->fill($request->all());
        $user->save();

        Flash("El usuario " . $user->name . " ha sido actualizado de forma exitosa")->warning()->important();

        return redirect(url("admin/users"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //dd($id);
        $user = User::find($id);
        $user->delete();
        Flash("El usuario $user->name ha sido eliminado de forma exitosa")->error()->important();

        return redirect(url("admin/users"));
    }
}

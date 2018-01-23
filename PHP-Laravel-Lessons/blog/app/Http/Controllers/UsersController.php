<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
	public function index() {

	}

    public function create() {
    	return view("admin/users/create");
    }

    public function store(Request $request) {
    	//dd($request->all());
    	$user = new User($request->all());
  		$user->password = bcrypt($request->password);
    	//dd($user);
    	$user->save();
    	dd("Usuario creado");
    }

    public function show() {
    	
    }

    public function edit() {
    	
    }

    public function update() {
    	
    }

    public function destroy() {
    	
    }    
}

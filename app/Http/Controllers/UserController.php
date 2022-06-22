<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /*
    index
    show
    get edit
    put update
    get create
    post store
    delete destroy
    */
    public function index(Request $request)
    {
        dd($request->all());
        // return 'Hello World!!';
        return view('welcome', ['name' => 'Ali']);
    }

    public function show($id, $name = null)
    {
        return "USer ID: $id, NAme: $name";
    }
}

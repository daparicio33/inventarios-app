<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('can:administrador.usuarios.index')->only('index');
        $this->middleware('can:administrador.usuarios.create')->only('create','store');
        $this->middleware('can:administrador.usuarios.edit')->only('edit','update');
        $this->middleware('can:administrador.usuarios.destroy')->only('destroy');
        $this->middleware('can:administrador.usuarios.show')->only('show');
        return $this->middleware('auth');
    }
    public function index()
    {
        //
        $users = User::all();
        return view('administrador.usuarios.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('administrador.usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $user = new User();
        if($request->hasFile('url')){
            $url = Storage::put('public/userspics', $request->file('url'));
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return Redirect::route('administrador.usuarios.index');
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
        $user = User::findOrfail($id);
        return view('administrador.usuarios.edit', compact('user'));
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
        $user = User::findOrfail($id);
        if($request->hasFile('url')){
            $url = Storage::put('public/userspics', $request->file('url'));
            $user->url = $url;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        if(isset($request->password)){
            $user->password = bcrypt($request->password);
        }
        $user->update();
        return Redirect::route('administrador.usuarios.index');
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
        $user = User::findOrFail($id);
        $user->delete();
        return Redirect::route('administrador.usuarios.index');
    }
}

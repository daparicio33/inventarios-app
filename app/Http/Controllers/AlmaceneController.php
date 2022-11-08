<?php

namespace App\Http\Controllers;
use App\Models\Almacene;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AlmaceneController extends Controller
{
    //
    
    function index(){
        $almacenes = Almacene::all();
         return view('administrador.almacenes.index', compact('almacenes'));
    }
    function create(){
         return view('administrador.almacenes.create');
    }
    function store(Request $request){
       $almacene = new Almacene();
        $almacene->nombre = $request->nombre;
        $almacene->observacion  = $request->observacion;
        $almacene->save();
        return Redirect::route('almacenes');
    }
    function show(){

    }
    function edit($id){
        $almacenes = Almacene::findOrfail($id);
        return view('administrador.almacenes.edit', compact('almacenes'));
    }
    function update($id, Request $request){
        $almacene = Almacene::findOrfail($id);
        $almacene->nombre = $request->nombre;
        $almacene->observacion = $request->observacion;
        $almacene->update();
        return Redirect::route('almacenes');

    }
    function destroy($id){
        $almacene = Almacene::findOrfail($id);
        $almacene->destroy();
        return Redirect::route('almecenes');

    }
}

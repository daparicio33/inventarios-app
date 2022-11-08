<?php

namespace App\Http\Controllers;
use App\Models\Almacene;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AlmaceneController extends Controller
{
    //
    
    
    public function index(){
        $almacenes = Almacene::all();
         return view('administrador.almacenes.index', compact('almacenes'));
    }
    public function create(){
         return view('administrador.almacenes.create');
    }
    public function store(Request $request){
       $almacene = new Almacene();
        $almacene->nombre = $request->nombre;
        $almacene->observacion = $request->observacion;
        $almacene->save();
        return Redirect::route('administrador.almacenes.index');
    }
    public function show(){

    }
    public function edit($id){
        $almacene = Almacene::findOrfail($id);
        return view('administrador.almacenes.edit', compact('almacene'));
    }
    public function update($id, Request $request){
        $almacene = Almacene::findOrfail($id);
        $almacene->nombre = $request->nombre;
        $almacene->observacion = $request->observacion;
        $almacene->update();
        return Redirect::route('almacenes');

    }
    public function destroy($id){
        $almacene = Almacene::findOrfail($id);
        $almacene->destroy();
        return Redirect::route('almecenes');

    }
}

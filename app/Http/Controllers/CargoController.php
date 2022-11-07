<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CargoController extends Controller
{
    //
    function index(){
        $cargos = Cargo::all();
         return view('administrador.cargos.index', compact('cargos'));
    }
    function create(){
         return view('administrador.cargos.create');
    }
    function store(Request $request){
        $cargo = new Cargo();
        $cargo->nombre = $request->nombre;
        $cargo->save();
        return Redirect::route('cargos');
    }
    function show(){

    }
    function edit(){
        $cargos = Cargo::findOrfail($id);
        return view('administrador.cargo.edit', compact('cargos'));
    }
    function update($id, Request $request){
        $cargo = Cargo::findOrfail($id);
        $cargo->nombre = $request->nombre;
        $cargo->update();
        return Redirect::route('cargos');

    }
    function destroy($id){
        $cargo = Cargo::findOrfail($id);
        $cargo->destroy();
        return Redirect::route('cargos');

    }
}

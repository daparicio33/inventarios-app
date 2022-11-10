<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CargoController extends Controller
{
    //
    public function __construct()
    {
        return $this->middleware('auth');
    }
    function index(){
        $cargos = Cargo::all();
        return view('administrador.cargos.index', compact('cargos'));
    }
    function create(){
         return view('administrador.cargos.create');
    }
    function store(Request $request){
        try {
            //code...
            DB::beginTransaction();
                $cargo = new Cargo();
                $cargo->nombre = $request->nombre;
                $cargo->save();
            DB::commit();
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return Redirect::route('administrador.cargos.index')
            ->with('error','error al guardar los datos');
        }
        return Redirect::route('administrador.cargos.index')
        ->with('info','seguardo correctamente los datos del cargo');
    }
    function show(){

    }
    function edit($id){
        $cargos = Cargo::findOrfail($id);
        return view('administrador.cargo.edit', compact('cargos'));
    }
    function update($id, Request $request){
        try {
            //code...
            DB::beginTransaction();
                $cargo = Cargo::findOrfail($id);
                $cargo->nombre = $request->nombre;
                $cargo->update();
            DB::commit();
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return Redirect::route('administrador.cargos.index')
            ->with('error','se produjo un error actualizando los datos');
        }
        return Redirect::route('administrador.cargos.index')
        ->with('info','seguardo correctamente los datos del cargo');

    }
    function destroy($id){
        try {
            //code...
            $cargo = Cargo::findOrfail($id);
            $cargo->destroy();
        } catch (\Throwable $th) {
            //throw $th;
            return Redirect::route('administrador.cargos.index')
            ->with('error','se produjo un error eliminando los datos');
        }
        return Redirect::route('administrador.cargos.index')
        ->with('info','se elimino correctamente los datos');
    }
}

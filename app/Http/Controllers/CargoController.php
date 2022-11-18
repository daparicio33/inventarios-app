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
        $this->middleware('auth');
        $this->middleware('can:administrador.cargos.index')->only('index');
        $this->middleware('can:administrador.cargos.create')->only('create','store');
        $this->middleware('can:administrador.cargos.edit')->only('edit','update');
        $this->middleware('can:administrador.cargos.destroy')->only('destroy');
        $this->middleware('can:administrador.cargos.show')->only('show');
    }
    public function index(){
        $cargos = Cargo::all();
        return view('administrador.cargos.index', compact('cargos'));
    }
    public function create(){
         return view('administrador.cargos.create');
    }
    public function store(Request $request){
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
    public function show(){

    }
    public function edit($id){
        $cargo = Cargo::findOrfail($id);
        return view('administrador.cargos.edit', compact('cargo'));
    }
    public function update($id, Request $request){
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
    public function destroy($id){
        try {
            //code...
            $cargo = Cargo::findOrfail($id);
            $cargo->delete();
        } catch (\Throwable $th) {
            //throw $th;
            return Redirect::route('administrador.cargos.index')
            ->with('error','se produjo un error eliminando los datos');
        }
        return Redirect::route('administrador.cargos.index')
        ->with('info','se elimino correctamente los datos');
    }
}

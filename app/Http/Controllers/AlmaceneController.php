<?php

namespace App\Http\Controllers;
use App\Models\Almacene;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class AlmaceneController extends Controller
{
    //
    public function __construct()
    {
        return $this->middleware('auth');
    }
    
    public function index(){
        $almacenes = Almacene::all();
         return view('administrador.almacenes.index', compact('almacenes'));
    }
    public function create(){
         return view('administrador.almacenes.create');
    }
    public function store(Request $request){
        try {
            //code...
            DB::beginTransaction();
            $almacene = new Almacene();
            $almacene->nombre = $request->nombre;
            $almacene->observacion = $request->observacion;
            $almacene->save();
            DB::commit();
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return Redirect::route('administrador.almacenes.index')
            ->with('error','ocurrio un error cuando se intento guardar los datos');
        }
        return Redirect::route('administrador.almacenes.index')
        ->with('info','se guardo los datos correctamente');
    }
    public function show(){

    }
    public function edit($id){
        $almacene = Almacene::findOrfail($id);
        return view('administrador.almacenes.edit', compact('almacene'));
    }
    public function update($id, Request $request){
        try {
            //code...
            DB::beginTransaction();
                $almacene = Almacene::findOrfail($id);
                $almacene->nombre = $request->nombre;
                $almacene->observacion = $request->observacion;
                $almacene->update();
            DB::commit();
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return Redirect::route('administrador.almacenes.index')
            ->with('error','ocurrio un error cuando se intento guardar los datos');;
        }
        return Redirect::route('administrador.almacenes.index')
        ->with('info','se actualizo los datos correctamente');
    }
    public function destroy($id){
        try {
            //code...
            $almacene = Almacene::findOrfail($id);
            $almacene->delete();
        } catch (\Throwable $th) {
            //throw $th;
            return Redirect::route('administrador.almacenes.index')
            ->with('error','no se pudo eliminar el registro');
        }
        return Redirect::route('administrador.almacenes.index')
        ->with('info','se elimino el registro correctamente');
    }
}

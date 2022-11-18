<?php

namespace App\Http\Controllers;

use App\Models\Almacene;
use App\Models\Cargo;
use App\Models\Encargado;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Spatie\Permission\Models\Role;

class EncargadoController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('can:administrador.almacenes.encargados.index')->only('index');
        $this->middleware('can:administrador.almacenes.encargados.create')->only('create','store');
        $this->middleware('can:administrador.almacenes.encargados.edit')->only('edit','update');
        $this->middleware('can:administrador.almacenes.encargados.destroy')->only('destroy');
        $this->middleware('can:administrador.almacenes.encargados.show')->only('show');
        $this->middleware('auth');
    }

    public function index (){
        $encargados = Encargado::all();
        return  view('administrador.almacenes.encargados.index',
        compact('encargados'));
    }

    public function create(){
        $users = User::pluck('name','id')->toArray();
        $cargos = Cargo::pluck('nombre','id')->toArray();
        $almacenes = Almacene::pluck('nombre','id')->toArray();
        return view('administrador.almacenes.encargados.create',
        compact('users','cargos','almacenes'));
    }

    public function store(Request $request){
        try {
            //code...
            DB::beginTransaction();
            $encargado = new Encargado;
            $encargado->user_id= $request->user_id;
            $encargado->cargo_id= $request->cargo_id;
            //debemos sincronizar los permisos
            $user = User::findOrFail($request->user_id);
            //buscamos el nombre del rol
            $encargado->almacene_id= $request->almacene_id;
            $encargado->save();
            $cargo = Cargo::findOrFail($request->cargo_id);
            $role = Role::where('name','=',$cargo->nombre)->first();
            $user->assignRole($role->id);
            //find del rol
            DB::commit();
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            return Redirect::route('administrador.almacenes.encargados.index')
            ->with('error','ocurrio un error cuando se intento guardar los datos del encargado');
        }
        return Redirect::route('administrador.almacenes.encargados.index')
        ->with('info','se guardo los datos del encargado correctamente');
    }

    public function edit($id){
        $encargado = Encargado::findOrFail($id);
        $users = User::pluck('name','id')->toArray();
        $cargos = Cargo::pluck('nombre','id')->toArray();
        $almacenes = Almacene::pluck('nombre','id')->toArray();
        return view('administrador.almacenes.encargados.edit',
        compact('encargado','users','cargos','almacenes'));
    }

    public function update (Request $request, $id){
        try {
            //code...
            DB::beginTransaction();
                $encargado = Encargado::findOrFail($id);
                $encargado->user_id = $request->user_id;
                $encargado->cargo_id = $request->cargo_id;
                $encargado->almacene_id = $request->almacene_id;
                $encargado->update();
                //debemos sincronizar los permisos
                $user = User::findOrFail($request->user_id);
                //buscamos el nombre del rol
                $cargo = Cargo::findOrFail($request->cargo_id);
                $role = Role::where('name','=',$cargo->nombre)->first();
                $user->assignRole($role->id);
                //find del rol
            DB::commit();
        } catch (\Throwable $th) {
            //throw $th
            DB::rollback();
            dd($th->getMessage());
            return Redirect::route('administrador.almacenes.encargados.index')
            ->with('error','ocurrio un error cuando se intento guardar los datos del encargado');
        }
        return Redirect::route('administrador.almacenes.encargados.index')
        ->with('info','se actualizo los tados del encargado correctamente');
    }

    public function destroy($id){
        try {
            //code...
            $encargado = Encargado::findOrFail($id);
            $encargado->delete();
        } catch (\Throwable $th) {
            //throw $th;
            return Redirect::route('administrador.almacenes.encargados.index')
            ->with('error','no se pudo eliminar registro del encargado');
        }
        return Redirect::route('administrador.almacenes.encargados.index')
        ->with('info','se elimino el registro del encargado corrcetamante');
    }

}

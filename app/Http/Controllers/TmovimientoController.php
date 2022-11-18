<?php

namespace App\Http\Controllers;

use App\Models\Tmovimiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class TmovimientoController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('can:inventarios.movimientos.tmovimientos.index')->only('index');
        $this->middleware('can:inventarios.movimientos.tmovimientos.create')->only('create','store');
        $this->middleware('can:inventarios.movimientos.tmovimientos.edit')->only('edit','update');
        $this->middleware('can:inventarios.movimientos.tmovimientos.destroy')->only('destroy');
        $this->middleware('can:inventarios.movimientos.tmovimientos.show')->only('show');
        $this->middleware('auth');
    }
    public function index(){
        $tmovimientos = Tmovimiento::all();
         return view('inventarios.movimientos.tmovimientos.index', compact('tmovimientos'));
    }
    public function create(){
        return view('inventarios.movimientos.tmovimientos.create');
    }
    public function store(Request $request){
        try{
            //code...
            DB::beginTransaction();
            $tmovimiento = new Tmovimiento();
            $tmovimiento->nombre = $request->nombre;
            $tmovimiento->factor = $request->factor;
            $tmovimiento->administrador = $request->administrador;
            $tmovimiento->save();
            DB::commit();
        } catch (\Throwable $th){
            //throw $th;
            DB::rollBack();
            return Redirect::route('inventarios.movimientos.tmovimientos.index')
            ->with('error','ocurrio un error cuando se intento guardar los datos');
        }
        return Redirect::route('inventarios.movimientos.tmovimientos.index')
        ->with('info','se guardo los datos correctamente de tmovimiento');

    }
    public function show(){

    }
    public function edit($id){
        $tmovimiento = Tmovimiento::findOrfail($id);
        return view('inventarios.movimientos.tmovimientos.edit', compact('tmovimiento'));
    }
    public function update($id, Request $request){
        try {
            //code...
            DB::beginTransaction();
                $tmovimiento = Tmovimiento::findOrfail($id);
                $tmovimiento->nombre = $request->nombre;
                $tmovimiento->factor = $request->factor;
                $tmovimiento->administrador = $request->administrador;
                $tmovimiento->update();
            DB::commit();
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return Redirect::route('inventarios.movimientos.tmovimientos.index')
            ->with('error','ocurrio un error cuando se intento guardar los datos');

        }
        return Redirect::route('inventarios.movimientos.tmovimientos.index')
        ->with('info','se actualizo los datos correctamente de tmovimiento');

    }
    public function destroy($id){
        try {
            //code...
            $tmovimiento = Tmovimiento::findOrfail($id);
            $tmovimiento->delete();
        } catch (\Throwable $th ) {
            //throw $th;
            return Redirect::route('inventarios.movimientos.tmovimientos.index')
            ->with('error','no se puede eliminar el registro');
        }
        return Redirect::route('inventarios.movimientos.tmovimientos.index')
        ->with('info','se elimino el registro correctamente de tmovimiento');


    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Tmovimiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TmovimientoController extends Controller
{
    //
    function index(){
        $tmovimientos = Tmovimiento::all();
         return view('inventarios.movimientos.tmovimientos.index', compact('tmovimientos'));
    }
    function create(){
         return view('inventarios.movimientos.tmovimientos.create');
    }
    function store(Request $request){
        $tmovimiento = new Tmovimiento();
        $tmovimiento->nombre = $request->nombre;
        $tmovimiento->factor = $request->factor;
        $tmovimiento->save();
        return Redirect::route('inventarios.movimientos.tmovimientos.index');
    }
    function show(){

    }
    function edit($id){
        $tmovimiento = Tmovimiento::findOrfail($id);
        return view('inventarios.movimientos.tmovimientos.edit', compact('tmovimiento'));
    }
    function update($id, Request $request){
        $tmovimiento = Tmovimiento::findOrfail($id);
        $tmovimiento->nombre = $request->nombre;
        $tmovimiento->factor = $request->factor;
        $tmovimiento->update();
        return Redirect::route('inventarios.movimientos.tmovimientos.index');

    }
    function destroy($id){
        $tmovimiento = Tmovimiento::findOrfail($id);
        $tmovimiento->delete();
        return Redirect::route('inventarios.movimientos.tmovimientos.index');

    }
}

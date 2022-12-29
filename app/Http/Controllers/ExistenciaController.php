<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;

class ExistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
        
        $usuario = User::findOrFail(auth()->id());
        $items = Item::orderBy('id','desc')
        ->where('item_id','=',null)
        ->where('almacene_id','=',$usuario->encargado->almacene_id)
        ->get();
        return view('inventarios.existencias.index',compact('items'));
    }
    public function ingresos(){

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($tipo)
    {
        $usuario = User::findOrFail(auth()->id());
        if ($tipo == 'ingresos'){
            $items = Item::orderBy('id','desc')
            ->where('item_id','=',null)
            ->where('almacene_id','=',$usuario->encargado->almacene_id)
            ->get();
            return view('inventarios.existencias.ingresos',compact('items'));
        }
        if ($tipo == 'reposicion'){
            $items = Item::orderBy('id','desc')
            ->where('item_id','=',null)
            ->where('almacene_id','=',$usuario->encargado->almacene_id)
            ->get();
            return view('inventarios.existencias.reposiciones',compact('items'));
        }

        if ($tipo == 'perdida'){
            $items = Item::orderBy('id','desc')
            ->where('item_id','=',null)
            ->where('almacene_id','=',$usuario->encargado->almacene_id)
            ->get();
            return view('inventarios.existencias.perdidas',compact('items'));
        }
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
    }
}

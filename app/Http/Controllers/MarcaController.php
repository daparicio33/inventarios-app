<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        return $this->middleware('auth');
    }
    public function index()
    {
        //
        $marcas = Marca::all();
        return view('inventarios.marcas.index', compact('marcas'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('inventarios.marcas.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            //code...
            DB::beginTransaction();
            $marca = new Marca();
            $marca->nombre = $request->nombre;
            $marca->save();
            DB::commit();
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            return Redirect::route('inventarios.marcas.index')
            ->with('error','ocurrio un error cuando se intento guardar los datos');
        }
        return Redirect::route('inventarios.marcas.index')
        ->with('info','se guardo los datos de marcas correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $marcas = Marca::findOrfail($id);
        return view('inventarios.marcas.edit', compact('marcas'));
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
        try {
            //code...
            DB::beginTransaction();
            $marca = Marca::findOrfail($id);
            $marca->nombre = $request->nombre;
            $marca->update();
            DB::commit();
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            return Redirect::route('inventarios.marcas.index')
            ->with('error','ocurrio un error cuando se intento guardar los datos');
        }
        return Redirect::route('inventarios.marcas.index')
        ->with('info','se actualizo los datos de marca correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            //code...
            $marca = Marca::findOrfail($id);
            $marca->destroy();
        } catch (\Throwable $th){
            //throw $th;
            return Redirect::route('inventarios.marcas.index')
            ->with('error','no se puede eliminar el registo de marca');
        }
        return Redirect::route('inventarios.marcas.index')
        ->with('info','se elimino el registro marca correctamente');
    }
}

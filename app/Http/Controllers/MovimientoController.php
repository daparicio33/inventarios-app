<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Movimiento;
use App\Models\MovimientoDetalle;
use App\Models\Tmovimiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class MovimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $movimientos = Movimiento::orderBy('id','desc')
        ->get();
        return view('inventarios.movimientos.index',compact('movimientos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tmovimientos = Tmovimiento::orderBy('nombre','asc')
        ->pluck('nombre','id')->toArray();
        $items = Item::orderBy('descripcion','asc')
        ->get();
        return view('inventarios.movimientos.create',compact('tmovimientos','items'));
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
        $numero = Movimiento::select('numero')->orderBy('numero','desc')
        ->first();
        if (isset($numero->numero)){
            $numero = $numero + 1;
        }else{
            $numero = 1;
        }
        try {
            //code...
            
            DB::beginTransaction();
            $moviento = new Movimiento;
            $moviento->tmovimiento_id = $request->tmovimiento_id;
            $moviento->fecha = $request->fecha;
            $moviento->hora = $request->hora;
            $moviento->numero = $numero;
            $moviento->save();
            $rows = count($request->items_id);
            for ($i=0; $i<$rows; $i++){
                $detalle = new MovimientoDetalle;
                $detalle->movimiento_id = $moviento->id;
                $detalle->item_id = $request->items_id[$i];
                $detalle->cantidad = $request->cantidad[$i];
                $detalle->save();
            }
            DB::commit();
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return Redirect::route('inventarios.movimientos.index')
            ->with('error',$th->getMessage());
        }
        return Redirect::route('inventarios.movimientos.index')
        ->with('info','movimiento guardado');
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
        try {
            //code...
            $moviento = Movimiento::findOrFail($id);
            $moviento->delete();
        } catch (\Throwable $th) {
            //throw $th;
            return Redirect::route('inventarios.movimientos.index')
            ->with('error',$th->getMessage());
        }
        return Redirect::route('inventarios.movimientos.index')
        ->with('info','se elimino correctamente');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Item;
use App\Models\Movimiento;
use App\Models\MovimientoDetalle;
use App\Models\Tmovimiento;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use PDF;
class AlmaceneroController extends Controller
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
        $movimientos = Movimiento::orderBy('id','desc')
        ->whereRelation('tmovimiento','nombre','Prestamo')
        /* ->orWhereRelation('tmovimiento','nombre','Devolucion') */
        ->where('almacene_id','=',almacen())
        ->get();
        return view('almaceneros.index',compact('movimientos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $cliente = null;
        if ($request->searchText){
            $cliente = Cliente::where('dniRuc','=',$request->searchText)
            ->first();
        }
        $searchText = $request->searchText;
        $tmovimientos = Tmovimiento::orderBy('nombre','asc')
        ->where('administrador','=','NO')
        ->pluck('nombre','id')->toArray();
        $items = Item::orderBy('descripcion','asc')
        ->get();
        return view('almaceneros.create',compact('tmovimientos','items','searchText','cliente'));
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
        $validated = $request->validate([
            'tmovimiento_id'=>'required',
            'fecha'=>'required',
            'hora'=>'required',
            'cliente_id'=>'required',
            'items_id'=>'required'
        ]);
        $num = Movimiento::select('numero')->orderBy('numero','desc')
        ->first();
        if (isset($num->numero)){
            $numero = $num->numero + 1;
        }else{
            $numero = 1;
        }
        try {
            //code...
            DB::beginTransaction();
            $movimiento = new Movimiento;
            $movimiento->tmovimiento_id = $request->tmovimiento_id;
            $movimiento->fecha = $request->fecha;
            $movimiento->hora = $request->hora;
            $movimiento->numero = $numero;
            $movimiento->fdevolucion = $request->fdevolucion;
            $movimiento->cliente_id = $request->cliente_id;
            $movimiento->user_id = auth()->id();
            $movimiento->almacene_id = almacen();
            $movimiento->save();
            $rows = count($request->items_id);
            for ($i=0; $i<$rows; $i++){
                $detalle = new MovimientoDetalle;
                $detalle->movimiento_id = $movimiento->id;
                $detalle->item_id = $request->items_id[$i];
                $detalle->cantidad = $request->cantidad[$i];
                $detalle->save();
                //si aca se graba el item verifico si
                $item = Item::findOrFail($request->items_id[$i]);
                //verifico si tiene items inferiores;
                if(count($item->hijos)!= 0){
                    foreach($item->hijos as $hijo){
                        $detallitos = new MovimientoDetalle;
                        $detallitos->movimiento_id = $movimiento->id;
                        $detallitos->item_id = $hijo->id;
                        $detallitos->cantidad = $request->cantidad[$i];
                        $detallitos->save();
                    }
                }
            }
            DB::commit();
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            dd($th->getMessage());
            return Redirect::route('almaceneros.index')
            ->with('error',$th->getMessage());
        }
        return Redirect::route('almaceneros.index')
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
            return Redirect::route('almaceneros.index')
            ->with('error',$th->getMessage());
        }
        return Redirect::route('almaceneros.index')
        ->with('info','se elimino correctamente');
    }
    public function devoluciones(Request $request,$id){
        //dd ($request);
        try {
            $fecha = Carbon::now()->toDateString();
            $hora = Carbon::now()->toTimeString();
            //code...
            $num = Movimiento::select('numero')->orderBy('numero','desc')
            ->first();
            if (isset($num->numero)){
                $numero = $num->numero + 1;
            }else{
                $numero = 1;
            }
            DB::beginTransaction();
                $prestado = Movimiento::findOrFail($id);
                $devuelto = new Movimiento();
                $devuelto->numero = $numero;
                $devuelto->fecha = $fecha;
                $devuelto->tmovimiento_id = Tmovimiento::where('nombre','Devolucion')->first()->id;
                $devuelto->cliente_id = $prestado->cliente_id;
                $devuelto->almacene_id = $prestado->almacene_id;
                $devuelto->movimiento_id = $prestado->id;
                $devuelto->hora = $hora;
                $devuelto->user_id = auth()->id();
                $devuelto->save();
                $prestado->movimiento_id = $devuelto->id;
                $prestado->update();
                //iniciamos con los detalles
                foreach ($prestado->detalles as $detalle) {
                    # code...
                    //con los prestados vamos adevolverlos
                    if(buscar($request->opciones,$detalle->id)){
                        //se encontro el producto
                        //y tenemos que agregarlo a la devolucion.
                        $detalleprestado = MovimientoDetalle::findOrFail($detalle->id);
                        $detalledevuelto = new MovimientoDetalle();
                        $detalledevuelto->item_id = $detalleprestado->item_id;
                        $detalledevuelto->movimiento_id = $devuelto->id;
                        $detalledevuelto->cantidad = $detalleprestado->cantidad;
                        $detalledevuelto->save();
                    }else{
                        //nose encontro y debemos registrar como perdido.
                        //o en caso contrario ver que hacemos.
                    }
                }
            DB::commit();
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            dd($th->getMessage());
            return redirect::route('almaceneros.index')->with('error','nose registro correctamente la devolucion');
        }
        return redirect::route('almaceneros.index')->with('info','se guardo la informacion correctamente');
    }
    public function imprimir($id){
        $movimiento = Movimiento::findOrFail($id);
        /* $pdf = PDF::loadview('almaceneros.imprimir',['movimiento'=>$movimiento]);
        $pdf->setPaper('a4','landscape');
        return $pdf->download('pdfa.pdf'); */
        return view('almaceneros.imprimir',compact('movimiento'));
    }
}

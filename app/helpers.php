<?php

use App\Models\MovimientoDetalle;
use App\Models\Tmovimiento;
use App\Models\User;
function ceroscodigos($numero){
    $tamanio = strlen($numero);
    $salida = $numero;
    for($i=$tamanio; $i<8;$i++){
        $salida= '0'.$salida;
    }
    return $salida;
}
function ceros($numero){
    $tamanio = strlen($numero);
    $salida = $numero;
    for($i=$tamanio; $i<3;$i++){
        $salida= '0'.$salida;
    }
    return $salida;
}

function buscar($array,$buscado){
    $salida = false;
    try {
        //code...
        $cantidad = 0;
        if(is_array($array)){
            $cantidad = count($array);
        }else{
            $cantidad = 1;
        }
        for($i=0;$i<$cantidad;$i++){
            if($array[$i]==$buscado){
                $salida = true;
                break;
            }
        }
        
    } catch (\Throwable $th) {
        //throw $th;
        return false;
    }
    return $salida;
}
function numeros($id){
    $dmovimientos = MovimientoDetalle::where('item_id','=',$id)
    ->get();
    $cantidad=0;
    foreach ($dmovimientos as $dmovimiento){
        $cantidad = $dmovimiento->movimiento->tmovimiento->factor * $dmovimiento->cantidad + $cantidad;
    }
    return $cantidad;
}
function ingresos($id){
    $idTmovimiento = Tmovimiento::where('nombre','=','Ingreso')->first();
    $dmovimientos = MovimientoDetalle::where('item_id','=',$id)
    ->WhereRelation('movimiento','tmovimiento_id',$idTmovimiento->id)
    ->get();
    $cantidad=0;
    foreach ($dmovimientos as $dmovimiento){
        $cantidad = $dmovimiento->movimiento->tmovimiento->factor * $dmovimiento->cantidad + $cantidad;
    }
    return $cantidad;
}
function perdidas($id){
    $idTmovimiento = Tmovimiento::where('nombre','=','Perdida')->first();
    $dmovimientos = MovimientoDetalle::where('item_id','=',$id)
    ->WhereRelation('movimiento','tmovimiento_id',$idTmovimiento->id)
    ->get();
    $cantidad=0;
    foreach ($dmovimientos as $dmovimiento){
        $cantidad = $dmovimiento->movimiento->tmovimiento->factor * $dmovimiento->cantidad + $cantidad;
    }
    return $cantidad;
}
function reposiciones($id){
    $idTmovimiento = Tmovimiento::where('nombre','=','Reposicion')->first();
    $dmovimientos = MovimientoDetalle::where('item_id','=',$id)
    ->WhereRelation('movimiento','tmovimiento_id',$idTmovimiento->id)
    ->get();
    $cantidad=0;
    foreach ($dmovimientos as $dmovimiento){
        $cantidad = $dmovimiento->movimiento->tmovimiento->factor * $dmovimiento->cantidad + $cantidad;
    }
    return $cantidad;
}
function almacen(){
    $id = User::findOrFail(auth()->id());
    return $id->encargado->almacene_id;
}
<?php

use App\Models\MovimientoDetalle;
use App\Models\User;

function numeros($id){
    $dmovimientos = MovimientoDetalle::where('item_id','=',$id)
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
function sino(){
    $ar = [['administrador'=>'si'],['administrador'=>'no']];
    return $ar;
}
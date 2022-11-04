<?php

use App\Models\MovimientoDetalle;

function numeros($id){
    $dmovimientos = MovimientoDetalle::where('item_id','=',$id)
    ->get();
    $cantidad=0;
    foreach ($dmovimientos as $dmovimiento){
        $cantidad = $dmovimiento->movimiento->tmovimiento->factor * $dmovimiento->cantidad + $cantidad;
    }
    return $cantidad;
}
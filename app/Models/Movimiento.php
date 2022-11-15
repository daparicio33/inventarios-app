<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function detalles(){
        return $this->hasMany(MovimientoDetalle::class);
    }
    public function tmovimiento(){
        return $this->belongsTo(Tmovimiento::class);
    }

/* 
    public function hijos(){
        return $this->hasMany(Item::class);
    }
    public function padre(){
        return $this->belongsTo(Item::class,'item_id');
    }
 */
    public function devolucion(){
        return $this->hasOne(Movimiento::class);
    }
    public function cliente(){
        return $this->belongsTo(Cliente::class,'cliente_id','idCliente');
    }
    
}

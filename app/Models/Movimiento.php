<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
    use HasFactory;
    public function detalles(){
        return $this->hasMany(MovimientoDetalle::class);
    }
    public function tmovimiento(){
        return $this->belongsTo(Tmovimiento::class);
    }
}

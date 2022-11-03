<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovimientoDetalle extends Model
{
    use HasFactory;
    public function movimiento(){
        return $this->belongsTo(Movimiento::class);
    }
    public function item(){
        return $this->belongsTo(Item::class);
    }
}

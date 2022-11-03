<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    public function hijos(){
        return $this->hasMany(Item::class);
    }
    public function padre(){
        return $this->belongsTo(Item::class,'item_id');
    }
    public function marca(){
        return $this->belongsTo(Marca::class);
    }
    public function titem(){
        return $this->belongsTo(Titem::class);
    }
}

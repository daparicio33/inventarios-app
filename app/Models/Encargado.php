<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encargado extends Model
{
    use HasFactory;
    public function usuario(){
        return $this->belongsTo(User::class);
    }
    public function cargo(){
        return $this->belongsTo(Cargo::class);
    }
    public function almacene(){
        return $this->belongsTo(Almacene::class);
    }
}

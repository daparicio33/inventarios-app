<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Almacene extends Model
{
    use HasFactory;
    public function encagados(){
        return $this->hasMany(Encargado::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puesto extends Model
{
    use HasFactory;

    protected $table = "puestos";
    //relacion uno a muchos
    public function users(){
        return $this->hasMany(User::class, 'IdPuesto', 'id');
    }
}

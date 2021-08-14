<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barbeiro extends Model
{
    protected $table = "barbeiro";

    use HasFactory;

    protected $fillable = [
        'id_barbearia_barbeiro',
        'id_usuario',
        'tipo'
    ];

}

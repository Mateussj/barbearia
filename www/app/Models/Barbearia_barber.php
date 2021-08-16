<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barbearia_barber extends Model
{
    protected $table = "barbearia_barbeiro";

    use HasFactory;

    protected $fillable = [
        'id_barbearia',
        'id_tipo_usuario',
        'tipo'
    ];
}

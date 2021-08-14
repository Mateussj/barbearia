<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
    protected $table = "avaliacao";

    use HasFactory;

    protected $fillable = [
        'nota_barbeiro',
        'nota_ambiente',
        'nota_servico',
        'comentario'
    ];
}

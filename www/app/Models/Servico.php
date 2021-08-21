<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    protected $table = "servico";

    use HasFactory;

    protected $fillable = [
        'id_barbeiro',
        'nome',
        'descricao',
        'valor',
        'tempo',
        'id_perfil'
    ];
}

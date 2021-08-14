<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barbearia extends Model
{
    protected $table = "barbearia";

    use HasFactory;

    protected $fillable = [
        'nome',
        'descricao',
        'localizacao',
        'avatar',
        'id_plano_barbearia',
        'telefone',
        'cnpj'
    ];

}

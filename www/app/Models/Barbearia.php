<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barbearia extends Model
{
    public $timestamps = false;

    protected $table = "barbearia";

    use HasFactory;

    protected $fillable = [
        'nome',
        'descricao',
        'localizacao',
        'avatar',
    ];

}

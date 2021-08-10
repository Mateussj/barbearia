<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plano_barbearia extends Model
{
    use HasFactory;

    protected $table = "plano_barbearias";

    protected $fillable = [
        'id_plano',
        'data_contratacao',
        'data_renovacao'
    ];
}


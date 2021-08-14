<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eventos_agenda extends Model
{
    protected $table = "eventos_agenda";

    use HasFactory;

    protected $fillable = [
        'id_agenda',
        'id_cliente',
        'id_servico_agenda',
        'data',
        'id_avaliacao'
    ];
}

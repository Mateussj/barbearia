<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servico_agenda extends Model
{
    protected $table = "servico_agenda";

    use HasFactory;

    protected $fillable = [
        'id_servico',
        'id_evento_agenda'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $table = "agenda";

    use HasFactory;

    protected $fillable = [
        'id_barbearia',
        'id_perfil'
    ];
}

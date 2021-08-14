<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plano extends Model
{
    protected $table = "plano";

    use HasFactory;

    protected $fillable = [
        'valor',
        'descricao',
        'periodo'
    ];


}

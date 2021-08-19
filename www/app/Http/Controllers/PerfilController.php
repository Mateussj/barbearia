<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public static function add($id, $tipo)
    {
        return response(
            json_encode(Perfil::create(
                [
                    'id_usuario' => $id,
                    'tipo' => $tipo
                ]
            )),
            200
        );
    }
}

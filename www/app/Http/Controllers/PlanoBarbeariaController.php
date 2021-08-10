<?php

namespace App\Http\Controllers;

use App\Models\Plano_barbearia;
use DateTime;
use Illuminate\Http\Request;

class PlanoBarbeariaController extends Controller
{

    public static function add($id_plano)
    {
        if (!$id_plano) {
            return response(
                'Invalid ID',
                400
            );
        }

        $data = date('Y-m-d H:i:s');

        $return = Plano_barbearia::create([
            'id_plano' => $id_plano,
            'data_contratacao' => $data,
            'data_renovacao' => $data
        ]);

        return $return->id;
    }

    public static function update($id_plano, $id)
    {
        if (!$id_plano and !$id) {
            return response(
                'Invalid ID',
                400
            );
        }

        $data = date('Y-m-d H:i:s');

        Plano_barbearia::where('id', $id)->update(
            [
                'nome' => $id_plano,
                'data_renovacao' => $data

            ]
        );
        return response(Plano_barbearia::where('id', $id)->get(), 200);
    }
}

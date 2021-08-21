<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{

    public function get()
    {
        $agenda = new Agenda;
        return response(
            json_encode($agenda->get()),
            200
        );
    }

    public function add(Request $request)
    {
        $request = json_decode($request->getContent(), true);

        if ($this->validateProduct($request)) {
            return response('Invalid data', 401);
        }

        return response(
            json_encode(Agenda::create([
                'id_barbearia' => $request['id_barbearia'],
                'id_perfil' => $request['id_perfil']
            ])),
            200
        );
    }

    public function validateProduct($request)
    {
        if ((!isset($request['id_perfil']) or $request['id_perfil'] == '')
        or (!isset($request['id_barbearia']) or $request['id_barbearia'] == '')
        ) {
            return true;
        }
    }
}

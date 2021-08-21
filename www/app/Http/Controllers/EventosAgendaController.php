<?php

namespace App\Http\Controllers;

use App\Models\Eventos_agenda;
use Illuminate\Http\Request;

class EventosAgendaController extends Controller
{

    public function get()
    {
        $evento = new Eventos_agenda;
        return response(
            json_encode($evento->get()),
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
            json_encode(Eventos_agenda::create([
                'id_agenda' => $request['id_agenda'],
                'id_cliente' => $request['id_cliente'],
                'data' => $request['data']
            ])),
            200
        );
    }

    public function update(Request $request, $id)
    {

        $request = json_decode($request->getContent(), true);

        if (!$id) {
            return response(
                'Invalid ID',
                400
            );
        }

        if ($this->validateProduct($request)) {

            return response('Invalid data', 401);
        }

        Eventos_agenda::where('id', $id)->update(
            [
                'id_agenda' => $request['id_agenda'],
                'id_cliente' => $request['id_cliente'],
                'data' => $request['data']
            ]
        );
        return response(Eventos_agenda::where('id', $id)->get(), 200);
    }

    public function validateProduct($request)
    {
        if ((!isset($request['id_agenda']) or $request['id_agenda'] == '')
        or (!isset($request['id_cliente']) or $request['id_cliente'] == '')
        or (!isset($request['data']) or $request['data'] == '')
        ) {
            return true;
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Servico_agenda;
use Illuminate\Http\Request;

class ServicoAgendaController extends Controller
{

    public function get()
    {
        $servicoAgenda = new Servico_agenda;
        return response(
            json_encode($servicoAgenda->get()),
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
            json_encode(Servico_agenda::create([
                'id_servico' => $request['id_servico'],
                'id_evento_agenda' => $request['id_evento_agenda']
            ])),
            200
        );
    }

    public function delete($id)
    {
        $servicoAgenda = Servico_agenda::findOrfail($id);
        $servicoAgenda->delete();

        return response()->json(null, 204);
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

        Servico_agenda::where('id', $id)->update(
            [
                'id_servico' => $request['id_servico'],
                'id_agenda' => $request['id_agenda']
            ]
        );
        return response(Servico_agenda::where('id', $id)->get(), 200);
    }

    public function validateProduct($request)
    {
        if ((!isset($request['id_servico']) or $request['id_servico'] == '')
        or (!isset($request['id_evento_agenda']) or $request['id_evento_agenda'] == '')
        ) {
            return true;
        }
    }
}

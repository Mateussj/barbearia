<?php

namespace App\Http\Controllers;

use App\Models\Servico;
use Illuminate\Http\Request;

class ServicoController extends Controller
{

    public function get()
    {
        $servico = new Servico;
        return response(
            json_encode($servico->get()),
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
            json_encode(Servico::create([
                'nome' => $request['nome'],
                'descricao' => $request['descricao'],
                'valor' => $request['valor'],
                'tempo' => $request['tempo'],
                'id_perfil' => $request['id_perfil']
            ])),
            200
        );
    }

    public function delete($id)
    {
        $servico = Servico::findOrfail($id);
        $servico->delete();

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

        Servico::where('id', $id)->update(
            [
                'nome' => $request['nome'],
                'descricao' => $request['descricao'],
                'valor' => $request['valor'],
                'tempo' => $request['tempo'],
                'id_perfil' => $request['id_perfil']
            ]
        );
        return response(Servico::where('id', $id)->get(), 200);
    }

    public function validateProduct($request)
    {
        if ((!isset($request['nome']) or $request['nome'] == '')
        or (!isset($request['descricao']) or $request['descricao'] == '')
        or (!isset($request['valor']) or $request['valor'] < 0)
        or (!isset($request['tempo']) or $request['tempo'] == '')
        or (!isset($request['id_perfil']) or $request['id_perfil'] == '')
        ) {
            return true;
        }
    }
}

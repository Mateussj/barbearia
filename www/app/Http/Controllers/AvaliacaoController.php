<?php

namespace App\Http\Controllers;
use App\Models\Avaliacao;

use Illuminate\Http\Request;


class AvaliacaoController extends Controller
{
    public function get()
    {
        $avaliacao = new Avaliacao();
        return response(
            json_encode($avaliacao->get()),
            200
        );
    }

    public function add(Request $request)
    {
        $request = json_decode($request->getContent(), true);
/*
        if ($this->validarDados($request)) {
            return response('Invalid data', 202);
        }
*/
        return response(
            json_encode(Avaliacao::create($request)),
            200
        );
    }
    public function validarDados($request)
    {
        if (
            (!isset($request['nota_barbeiro']) or $request['nota_barbeiro'] < 0)
            or (!isset($request['nota_ambiente']) or $request['nota_ambiente'] < 0)
            or (!isset($request['nota_servico']) or $request['nota_servico'] < 0)
            or (!isset($request['id_evento_agenda']) or $request['id_evento_agenda'] < 0)
        ) {
            return true;
        }
    }
}

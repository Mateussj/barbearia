<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{

    public function get()
    {
        $usuario = new User;
        return response(
            json_encode($usuario->get()),
            200
        );
    }

    public function add(Request $request)
    {
        $request = json_decode($request->getContent(), true);
        $request['password'] = Hash::make($request['password']);
        if ($this->validarDados($request)) {
            return response('Invalid data', 202);
        }
        $user = User::create($request);

        PerfilController::add($user['id'], $request['tipo']);
        return response(
            json_encode($user),
            200
        );
    }

    public function delete($id)
    {
        $usuario = User::findOrfail($id);
        $usuario->delete();

        return response()->json('Sucesso ao deletar', 204);
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

        if ($this->validarDados($request)) {

            return response('Invalid data', 202);
        }

        User::where('id', $id)->update($request);
        return response(User::where('id', $id)->get(), 200);
    }


    public function validarDados($request)
    {
        if (
            (!isset($request['nome']) or $request['nome'] == '')
            or (!isset($request['email']) or $request['email'] == '')
            or (!isset($request['password']) or $request['password'] == '')
        ) {
            return true;
        }
    }
}

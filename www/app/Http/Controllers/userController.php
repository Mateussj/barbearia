<?php

namespace App\Http\Controllers;

use App\models\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function add(Request $request)
    {
        /**
         * @OA\Post(
         *      path="/api/planos",
         *      operationId="addPlanos",
         *      tags={"Planos"},
         *      summary="Add Planos",
         *      @OA\RequestBody(
         *       @OA\JsonContent(
         *         type="object",
         *         @OA\Property(property="periodo", type="integer"),
         *         @OA\Property(property="descricao", type="string"),
         *         @OA\Property(property="valor", type="string", format="float")
         *        )
         *      ),
         *      @OA\Response(
         *          response=200,
         *          description="Successful operation",
         *       ),
         *      @OA\Response(
         *          response=202,
         *          description="Invalid data",
         *      ),
         *     )
         */

        $request = json_decode($request->getContent(), true);


        if ($this->validarDados($request)) {
            return response('Invalid data', 202);
        }

        //dd($request);
        return response(
            json_encode(User::create([
                'nome' => $request['nome'],
                'email' => $request['email'],
                'password' => $request['password'],
                'provider' => $request['provider'],
                'provider_id' => $request['provider_id'],
                'avatar' => $request['avatar'],
            ])),
            200
        );
    }

    public function delete($id)
    {
        /**
         * @OA\Delete(
         *      path="/api/planos/{id}",
         *      operationId="deletePlanos",
         *      tags={"Planos"},
         *      summary="Delete Planos",
         *  @OA\Parameter(
         *          name="id",
         *          description="Planos id",
         *          required=true,
         *          in="path",
         *          @OA\Schema(
         *              type="integer"
         *          )
         *      ),
         *      @OA\Response(
         *          response=204,
         *          description="Successful operation",
         *       ),
         *     )
         */

        $Plano = User::findOrfail($id);
        $Plano->delete();

        return response()->json(null, 204);
    }

    public function update(Request $request, $id)
    {
        /**
         * @OA\Put(
         *      path="/api/planos/{id}",
         *      operationId="putPlanos",
         *      tags={"Planos"},
         *      summary="Update existing Planos",
         *      description="Returns updated Planos data",
         *
         *  @OA\Parameter(
         *          name="id",
         *          description="Id",
         *          required=true,
         *          in="path",
         *          @OA\Schema(
         *              type="integer"
         *          )
         *      ),
         *     @OA\RequestBody(
         *       @OA\JsonContent(
         *         type="object",
         *          @OA\Property(property="periodo", type="integer"),
         *         @OA\Property(property="descricao", type="string"),
         *         @OA\Property(property="valor", type="string", format="decimal")
         *        )
         *      ),
         *      @OA\Response(
         *          response=200,
         *          description="Successful operation",
         *       ),
         *      @OA\Response(
         *          response=400,
         *          description="Invalid ID",
         *       ),
         *      @OA\Response(
         *          response=202,
         *          description="Invalid data",
         *       ),
         *
         *     )
         */

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


        User::where('id', $id)->update(
            [
                'nome' => $request['nome'],
                'email' => $request['email'],
                'password' => $request['password'],
                'provider' => $request['provider'],
                'provider_id' => $request['provider_id'],
                'avatar' => $request['avatar'],
            ]
        );
        return response(user::where('id', $id)->get(), 200);
    }


    public function validarDados($request)
    {
        if (
            (!isset($request['nome']) or $request['nome'] == '')
            or (!isset($request['email']) or $request['email'] == '')
            or (!isset($request['password']) or $request['password'] == '')
            or (!isset($request['provider']) or $request['provider'] == '')
            or (!isset($request['provider_id']) or $request['provider_id'] == '')
            or (!isset($request['avatar']) or $request['avatar'] == '')
        ) {
            return true;
        }
    }
}

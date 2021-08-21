<?php

namespace App\Http\Controllers;

use App\Models\Barbearia;
use Illuminate\Http\Request;


class BarbeariaController extends Controller
{

    public function get()
    {
        /**
         * @OA\Get(
         *      path="/api/barbearia",
         *      operationId="getbarbeariaList",
         *      tags={"Barbearia"},
         *      summary="Get list of barbearia",
         *      description="Returns list of barbearia",
         *      @OA\Response(
         *          response=200,
         *          description="Successful operation",
         *       ),
         *      @OA\Response(
         *          response=401,
         *          description="Unauthenticated",
         *      ),
         *      @OA\Response(
         *          response=403,
         *          description="Forbidden"
         *      )
         *     )
         */

        $Barbearia = new Barbearia;
        return response(
            json_encode($Barbearia->get()),
            200
        );
    }

    public function add(Request $request)
    {
        /**
         * @OA\Post(
         *      path="/api/barbearia",
         *      operationId="addbarbearia",
         *      tags={"Barbearia"},
         *      summary="Add barbearia",
         *      @OA\RequestBody(
         *       @OA\JsonContent(
         *         type="object",
         *         @OA\Property(property="nome", type="string"),
         *         @OA\Property(property="descricao", type="string"),
         *         @OA\Property(property="localizacao", type="string"),
         *         @OA\Property(property="avatar", type="string")
         *        )
         *      ),
         *      @OA\Response(
         *          response=200,
         *          description="Successful operation",
         *       ),
         *      @OA\Response(
         *          response=401,
         *          description="Invalid data",
         *      ),
         *     )
         */

        $request = json_decode($request->getContent(), true);

        if ($this->validateProduct($request)) {
            return response('Invalid data', 401);
        }

        return response(
            json_encode(Barbearia::create([
                'nome' => $request['nome'],
                'descricao' => $request['descricao'],
                'localizacao' => $request['localizacao'],
                'avatar' => $request['avatar'],
                'cnpj' => $request['cnpj'],
                'id_plano_barbearia' => PlanoBarbeariaController::add($request['id_plano_barbearia'])
            ])),
            200
        );
    }

    public function delete($id)
    {
        /**
         * @OA\Delete(
         *      path="/api/barbearia/{id}",
         *      operationId="deleteBarbearia",
         *      tags={"Barbearia"},
         *      summary="Delete barbearia",
         *  @OA\Parameter(
         *          name="id",
         *          description="Barbearia id",
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

        $Barbearia = Barbearia::findOrfail($id);
        $Barbearia->delete();

        return response()->json(null, 204);
    }

    public function update(Request $request, $id)
    {
        /**
         * @OA\Put(
         *      path="/api/barbearia/{id}",
         *      operationId="putBarbearia",
         *      tags={"Barbearia"},
         *      summary="Update existing Barbearia",
         *      description="Returns updated Barbearia data",
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
         *         @OA\Property(property="nome", type="string"),
         *         @OA\Property(property="descricao", type="string"),
         *         @OA\Property(property="localizacao", type="string"),
         *         @OA\Property(property="avatar", type="string")
         *        )
         *      ),
         *      @OA\Response(
         *          response=204,
         *          description="Successful operation",
         *       ),
         *      @OA\Response(
         *          response=400,
         *          description="Invalid ID",
         *       ),
         *      @OA\Response(
         *          response=401,
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

        if ($this->validateProduct($request)) {

            return response('Invalid data', 401);
        }

        Barbearia::where('id', $id)->update(
            [
                'nome' => $request['nome'],
                'descricao' => $request['descricao'],
                'localizacao' => $request['localizacao'],
                'avatar' => $request['avatar'],
                'id_plano_barbearia' => PlanoBarbeariaController::update($request['id_plano_barbearia'],$id)
            ]
        );
        return response(Barbearia::where('id', $id)->get(), 200);
    }

    public function validateProduct($request)
    {
        if (!isset($request['nome']) or $request['nome'] == '') {
            return true;
        }
    }
}

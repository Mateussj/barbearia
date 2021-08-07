<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plano;

class PlanoController extends Controller
{
    public function get()
    {
        /**
         * @OA\Get(
         *      path="/api/planos",
         *      operationId="getPlanosList",
         *      tags={"Planos"},
         *      summary="Get list of Planos",
         *      description="Returns list of Planos",
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

        $Plano = new Plano;
        return response(
            json_encode($Plano->get()),
            200
        );
    }

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
         *         @OA\Property(property="valor", type="float")
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

        /*
        if ($this->validate($request)) {
            return response('Invalid data', 401);
        }*/

        return response(
            json_encode(Plano::create([
                'descricao' => $request['descricao'],
                'periodo' => $request['periodo'],
                'valor' => $request['valor'],
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

        $Plano = Plano::findOrfail($id);
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
         *         @OA\Property(property="valor", type="decimal")
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

        /*
        if ($this->validate($request)) {

            return response('Invalid data', 401);
        }
        */

        Plano::where('id', $id)->update(
            [
                'descricao' => $request['descricao'],
                'periodo' => $request['periodo'],
                'valor' => $request['valor'],
            ]
        );
        return response(Plano::where('id', $id)->get(), 200);
    }

    /*
    public function validate($request)
    {
        if (
            !isset($request['descricao']) or $request['descricao'] == ''
            and !isset($request['valor']) or $request['valor'] == ''
        ) {
            return true;
        }
    */
}

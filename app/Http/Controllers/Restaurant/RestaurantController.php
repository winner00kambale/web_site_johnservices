<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RestaurantController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/getRestaurantData",
     *      operationId="getRestaurantData",
     *      tags={"Restaurant"},
     *      summary="Get",
     *      description="Returns list",
     *      @OA\Response(
     *          response=200,
     *          description="Successful",
     * *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *       ),
     *     )
     */
    public function getRestaurantData()
    {
        $data = Restaurant::latest()->get();
        $result = [
            'message' => "success",
            'success' => true,
            'status' => 200,
            'data' => $data
        ];
        return response()->json($result);
    }

    /**
     * @OA\Post(
     * path="/api/createRestaurant",
     * summary="Create",
     * description="Creation",
     * security={{ "bearerAuth":{ }}},
     * operationId="createRestaurant",
     * tags={"Restaurant"},
     * @OA\RequestBody(
     *    required=true,
     *    description="Enregistrer",
     *    @OA\JsonContent(
     *       required={"title_en","title_fr","description_en","description_fr","horaire"},
     *       @OA\Property(property="title_en", type="string", format="text",example="rdc"),
     *       @OA\Property(property="title_fr", type="string", format="text",example="rdc"),
     *       @OA\Property(property="description_fr", type="string", format="text",example="winner kambale"),
     *       @OA\Property(property="description_en", type="string", format="text",example="rdc"),
     *       @OA\Property(property="horaire", type="string", format="text",example="08h00-22h00"),
     *    ),
     * ),
     * @OA\Response(
     *    response=201,
     *    description="success",
     *     ),
     * @OA\Response(
     *    response=401,
     *    description="ysteme",
     *     )
     * )
     */
    public function createRestaurant(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title_en' => 'required',
            'title_fr' => 'required',
            'description_fr' => 'required',
            'description_en' => 'required',
            'horaire' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Les données envoyées ne sont pas valides.',
                'errors' => $validator->errors()
            ], 422);
        }

        Restaurant::create([
            'title_en' => $request->title_en,
            'title_fr' => $request->title_fr,
            'description_fr' => $request->description_fr,
            'description_en' => $request->description_en,
            'horaire' => $request->horaire
        ]);
        $result = [
            'message' => "success",
            'success' => true,
            'status' => 201
        ];
        return response()->json($result);
    }
    /**
     * @OA\Put(
     * path="/api/updateRestaurant/{id}",
     * summary="Update",
     * description="Modification",
     * security={{ "bearerAuth":{ }}},
     * operationId="updateRestaurant",
     * tags={"Restaurant"},
     * @OA\Parameter(
     *    name="id",
     *    in="path",
     *    required=true,
     *    @OA\Schema(type="integer")
     * ),
     * @OA\RequestBody(
     *    required=false,
     *    description="Modifier",
     *    @OA\JsonContent(
     *       required={"title_en","title_fr","description_en","description_fr","horaire"},
     *       @OA\Property(property="title_en", type="string", format="text",example="rdc"),
     *       @OA\Property(property="title_fr", type="string", format="text",example="rdc"),
     *       @OA\Property(property="description_fr", type="string", format="text",example="winner kambale"),
     *       @OA\Property(property="description_en", type="string", format="text",example="rdc"),
     *       @OA\Property(property="horaire", type="string", format="text",example="08h00-22h00"),
     *    ),
     * ),
     * @OA\Response(
     *    response=200,
     *    description="success",
     * ),
     * @OA\Response(
     *    response=404,
     *    description="Service not found",
     * ),
     * @OA\Response(
     *    response=422,
     *    description="Validation error",
     * )
     * )
     */
    public function updateRestaurant(Request $request, $id)
    {
        $restaurant = Restaurant::find($id);

        if (!$restaurant) {
            return response()->json(['message' => 'restaurant not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'title_en' => 'required',
            'title_fr' => 'required',
            'description_fr' => 'required',
            'description_en' => 'required',
            'horaire' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Les données envoyées ne sont pas valides.',
                'errors' => $validator->errors()
            ], 422);
        }
        $restaurant->update([
            'title_en' => $request->title_en,
            'title_fr' => $request->title_fr,
            'description_fr' => $request->description_fr,
            'description_en' => $request->description_en,
            'horaire' => $request->horaire
        ]);
        $result = [
            'message' => "success",
            'success' => true,
            'status' => 200
        ];
        return response()->json($result);
    }

}

<?php

namespace App\Http\Controllers\Chambre;

use App\Http\Controllers\Controller;
use App\Models\Chambre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ChambreController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/getRoomsData",
     *      operationId="getRoomsData",
     *      tags={"Chambres"},
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
    public function getRoomsData()
    {
        $data = Chambre::latest()->get();
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
     * path="/api/createRoom",
     * summary="Create",
     * description="Creation",
     * security={{ "bearerAuth":{ }}},
     * operationId="createChambre",
     * tags={"Chambres"},
     * @OA\RequestBody(
     *    required=true,
     *    description="Enregistrer",
     *    @OA\JsonContent(
     *       required={"shot_description_fr","shot_description_en","designation","price"},
     *       @OA\Property(property="shot_description_fr", type="string", format="text",example="rdc"),
     *       @OA\Property(property="shot_description_en", type="string", format="text",example="rdc"),
     *       @OA\Property(property="designation", type="string", format="text",example="winner kambale"),
     *       @OA\Property(property="price", type="string", format="text",example="rdc"),
     *       @OA\Property(property="image", type="string", format="text",example="rdc")
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
    public function createChambre(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'shot_description_fr' => 'required',
            'shot_description_en' => 'required',
            'designation' => 'required',
            'price' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Les données envoyées ne sont pas valides.',
                'errors' => $validator->errors()
            ], 422);
        }
        $file = $request->file('image');
        $path = $file->store('images/Chambre', 'public');
        Chambre::create([
            'shot_description_fr' => $request->shot_description_fr,
            'shot_description_en' => $request->shot_description_en,
            'designation' => $request->designation,
            'price' => $request->price,
            'image' => $path
        ]);
        $result = [
            'message' => "success",
            'success' => true,
            'status' => 201
        ];
        return response()->json($result);
    }

    /**
     * @OA\Post(
     * path="/api/updateRoom/{id}",
     * summary="Update",
     * description="Modification",
     * security={{ "bearerAuth":{ }}},
     * operationId="updateChambre",
     * tags={"Chambres"},
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
     *       required={"shot_description_fr","shot_description_en","designation","price"},
     *       @OA\Property(property="shot_description_fr", type="string", format="text",example="rdc"),
     *       @OA\Property(property="shot_description_en", type="string", format="text",example="rdc"),
     *       @OA\Property(property="designation", type="string", format="text",example="winner kambale"),
     *       @OA\Property(property="price", type="string", format="text",example="rdc"),
     *       @OA\Property(property="image", type="string", format="text",example="rdc")
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
    public function updateChambre(Request $request, $id)
    {
        $service = Chambre::find($id);

        if (!$service) {
            return response()->json(['message' => 'room not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'shot_description_fr' => 'required',
            'shot_description_en' => 'required',
            'designation' => 'required',
            'price' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Les données envoyées ne sont pas valides.',
                'errors' => $validator->errors()
            ], 422);
        }

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($service->image);

            $file = $request->file('image');
            $path = $file->store('images/Chambre', 'public');
        } else {
            $path = $service->image;
        }

        $service->update([
            'shot_description_fr' => $request->shot_description_fr,
            'shot_description_en' => $request->shot_description_en,
            'designation' => $request->designation,
            'price' => $request->price,
            'image' => $path
        ]);

        $result = [
            'message' => "success",
            'success' => true,
            'status' => 200
        ];
        return response()->json($result);
    }
    /**
     * @OA\Delete(
     * path="/api/deleteRoom/{id}",
     * summary="Delete",
     * description="Suppression",
     * security={{ "bearerAuth":{ }}},
     * operationId="deleteChambre",
     * tags={"Chambres"},
     * @OA\Parameter(
     *    name="id",
     *    in="path",
     *    required=true,
     *    @OA\Schema(type="integer")
     * ),
     * @OA\Response(
     *    response=200,
     *    description="Slide deleted successfully",
     * ),
     * @OA\Response(
     *    response=404,
     *    description="Slide not found",
     * ),
     * @OA\Response(
     *    response=401,
     *    description="Unauthorized",
     * )
     * )
     */
    public function deleteChambre($id)
    {
        $chambre = Chambre::find($id);

        if (!$chambre) {
            return response()->json(['message' => 'chambre not found'], 404);
        }
        Storage::disk('public')->delete($chambre->image);

        $chambre->delete();

        return response()->json([
            'message' => "Slide deleted successfully",
            'success' => true,
            'status' => 200
        ]);
    }
    /**
     * @OA\Get(
     *     path="/api/getSingleRoom/{id}",
     *     summary="Afficher",
     *     description="Afficher ",
     *     security={{"bearerAuth":{}}},
     *     operationId="getSingleRoom",
     *     tags={"Chambres"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID de l'approv",
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="succès",
     *         @OA\JsonContent(
     *             @OA\Property(property="status", type="string", example="success"),
     *             @OA\Property(property="message", type="string", example="succès")
     *         ),
     * @OA\Response(
     *    response=401,
     *    description="le systeme",
     *     )
     *     ),
     *     )
     * )
     */
    public function getSingleRoom($id)
    {
        $data = Chambre::find($id);
        $result = [
            'message' => "success",
            'success' => true,
            'status' => 200,
            'data' => $data
        ];
        return response()->json($result);
    }
}

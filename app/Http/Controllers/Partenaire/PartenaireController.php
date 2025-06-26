<?php

namespace App\Http\Controllers\Partenaire;

use App\Http\Controllers\Controller;
use App\Models\Partenaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PartenaireController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/getAllPartenaire",
     *      operationId="getPartenaire",
     *      tags={"Partenaire"},
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
    public function getPartenaire()
    {
        $data = Partenaire::inRandomOrder()->get();

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
     * path="/api/createPartenaire",
     * summary="Create",
     * description="Creation",
     * security={{ "bearerAuth":{ }}},
     * operationId="storePartenaire",
     * tags={"Partenaire"},
     * @OA\RequestBody(
     *    required=true,
     *    description="Enregistrer",
     *    @OA\JsonContent(
     *       required={"name","website","image"},
     *       @OA\Property(property="name", type="string", format="text",example="winner kambale"),
     *       @OA\Property(property="website", type="string", format="text",example="rdc"),
     *       @OA\Property(property="image", type="string", format="text", example="winner@gmail.com")
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
    public function storePartenaire(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'website' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Les données envoyées ne sont pas valides.',
                'errors' => $validator->errors()
            ], 422);
        }
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('images/Partenaire', 'public');
        }
        Partenaire::create([
            'name' => $request->name,
            'website' => $request->website,
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
     * path="/api/updatePartenaire/{id}",
     * summary="Update",
     * description="Modification",
     * security={{ "bearerAuth":{ }}},
     * operationId="updatePartenaire",
     * tags={"Partenaire"},
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
     *       required={"name","website"},
     *       @OA\Property(property="name", type="string", format="text", example="winner kambale"),
     *       @OA\Property(property="website", type="string", format="text", example="rdc"),
     *       @OA\Property(property="image", type="string", format="text", example="winner@gmail.com")
     *    ),
     * ),
     * @OA\Response(
     *    response=200,
     *    description="success",
     * ),
     * @OA\Response(
     *    response=404,
     *    description="Partenaire not found",
     * ),
     * @OA\Response(
     *    response=422,
     *    description="Validation error",
     * )
     * )
     */
    public function updatePartenaire(Request $request, $id)
    {
        $partenaire = Partenaire::find($id);

        if (!$partenaire) {
            return response()->json(['message' => 'Partenaire not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'website' => 'nullable',
            'image' => 'nullable',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Verifier tous les champs svp'], 422);
        }

        if ($request->hasFile('image')) {

            Storage::disk('public')->delete($partenaire->image);

            $file = $request->file('image');
            $path = $file->store('images/Partenaire', 'public');
        } else {
            $path = $partenaire->image;
        }

        $partenaire->update([
            'name' => $request->name,
            'website' => $request->website,
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
     * path="/api/deletePartenaire/{id}",
     * summary="Delete",
     * description="Suppression",
     * security={{ "bearerAuth":{ }}},
     * operationId="deletePartenaire",
     * tags={"Partenaire"},
     * @OA\Parameter(
     *    name="id",
     *    in="path",
     *    required=true,
     *    @OA\Schema(type="integer")
     * ),
     * @OA\Response(
     *    response=200,
     *    description="Partenaire deleted successfully",
     * ),
     * @OA\Response(
     *    response=404,
     *    description="Partenaire not found",
     * ),
     * @OA\Response(
     *    response=401,
     *    description="Unauthorized",
     * )
     * )
     */
    public function deletePartenaire($id)
    {
        $partenaire = Partenaire::find($id);

        if (!$partenaire) {
            return response()->json(['message' => 'Partenaire not found'], 404);
        }
        Storage::disk('public')->delete($partenaire->image);

        $partenaire->delete();

        return response()->json([
            'message' => "Partenaire deleted successfully",
            'success' => true,
            'status' => 200
        ]);
    }
}

<?php

namespace App\Http\Controllers\Gallery;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class GalleryController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/getAllGalleyData",
     *      operationId="getAllGalleyData",
     *      tags={"Gallery"},
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
    public function getAllGalleyData()
    {
        $data = Gallery::inRandomOrder()->get();
        $result = [
            'message' => "success",
            'success' => true,
            'status' => 200,
            'data' => $data
        ];
        return response()->json($result);
    }

    /**
     * @OA\Get(
     *      path="/api/getSixImagesGallery",
     *      operationId="getSixGallery",
     *      tags={"Gallery"},
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
    public function getSixGallery()
    {
        $data = Gallery::inRandomOrder()->take(6)->get();

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
     * path="/api/createGallery",
     * summary="Create",
     * description="Creation",
     * security={{ "bearerAuth":{ }}},
     * operationId="storeGallery",
     * tags={"Gallery"},
     * @OA\RequestBody(
     *    required=true,
     *    description="Enregistrer",
     *    @OA\JsonContent(
     *       required={"designation_en","designation_fr","image"},
     *       @OA\Property(property="designation_en", type="string", format="text",example="winner kambale"),
     *       @OA\Property(property="designation_fr", type="string", format="text",example="rdc"),
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
    public function storeGallery(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'designation_en' => 'required',
            'designation_fr' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => 'Verifier tous les champs svp', 'errors' => $validator->errors()], 422);
        }
        $file = $request->file('image');
        $path = $file->store('images/Gallery', 'public');
        Gallery::create([
            'designation_en' => $request->designation_en,
            'designation_fr' => $request->designation_fr,
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
     * @OA\Put(
     * path="/api/updateGallery/{id}",
     * summary="Update",
     * description="Modification",
     * security={{ "bearerAuth":{ }}},
     * operationId="updateGallery",
     * tags={"Gallery"},
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
     *       required={"designation_en","designation_fr"},
     *       @OA\Property(property="designation_en", type="string", format="text", example="winner kambale"),
     *       @OA\Property(property="designation_fr", type="string", format="text", example="rdc"),
     *       @OA\Property(property="image", type="string", format="text", example="winner@gmail.com")
     *    ),
     * ),
     * @OA\Response(
     *    response=200,
     *    description="success",
     * ),
     * @OA\Response(
     *    response=404,
     *    description="Gallery not found",
     * ),
     * @OA\Response(
     *    response=422,
     *    description="Validation error",
     * )
     * )
     */
    public function updateGallery(Request $request, $id)
    {
        $gallery = Gallery::find($id);

        if (!$gallery) {
            return response()->json(['message' => 'Gallery not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'designation_en' => 'required',
            'designation_fr' => 'required',
            'image' => 'nullable',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Verifier tous les champs svp', 'errors' => $validator->errors()], 422);
        }

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($gallery->image);

            $file = $request->file('image');
            $path = $file->store('images/Gallery', 'public');
        } else {
            $path = $gallery->image;
        }

        $gallery->update([
            'designation_en' => $request->designation_en,
            'designation_fr' => $request->designation_fr,
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
     * path="/api/deleteGallery/{id}",
     * summary="Delete",
     * description="Suppression",
     * security={{ "bearerAuth":{ }}},
     * operationId="deleteGallery",
     * tags={"Gallery"},
     * @OA\Parameter(
     *    name="id",
     *    in="path",
     *    required=true,
     *    @OA\Schema(type="integer")
     * ),
     * @OA\Response(
     *    response=200,
     *    description="Gallery deleted successfully",
     * ),
     * @OA\Response(
     *    response=404,
     *    description="Gallery not found",
     * ),
     * @OA\Response(
     *    response=401,
     *    description="Unauthorized",
     * )
     * )
     */
    public function deleteGallery($id)
    {
        $gallery = Gallery::find($id);

        if (!$gallery) {
            return response()->json(['message' => 'Gallery not found'], 404);
        }

        Storage::disk('public')->delete($gallery->image);

        $gallery->delete();

        return response()->json([
            'message' => "Gallery deleted successfully",
            'success' => true,
            'status' => 200
        ]);
    }

    /**
     * @OA\Get(
     *     path="/api/getSingleGallery/{id}",
     *     summary="Afficher",
     *     description="Afficher ",
     *     security={{"bearerAuth":{}}},
     *     operationId="getSingleGallery",
     *     tags={"Gallery"},
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
    public function getSingleGallery($id)
    {
        $data = Gallery::find($id);
        $result = [
            'message' => "success",
            'success' => true,
            'status' => 200,
            'data' => $data
        ];
        return response()->json($result);
    }
}

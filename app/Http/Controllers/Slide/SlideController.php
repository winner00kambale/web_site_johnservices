<?php

namespace App\Http\Controllers\Slide;

use App\Http\Controllers\Controller;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SlideController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/getAllSlideData",
     *      operationId="getAllSlideData",
     *      tags={"Slide"},
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
    public function getAllSlideData()
    {
        $data = Slide::inRandomOrder()->get();
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
     *      path="/api/getOneSilde",
     *      operationId="getOneSilde",
     *      tags={"Slide"},
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
    public function getOneSilde()
    {
        $data = Slide::inRandomOrder()->take(1)->get();
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
     * path="/api/createSlide",
     * summary="Create",
     * description="Creation",
     * security={{ "bearerAuth":{ }}},
     * operationId="storeSlide",
     * tags={"Slide"},
     * @OA\RequestBody(
     *    required=true,
     *    description="Enregistrer",
     *    @OA\JsonContent(
     *       required={"hotel_name","title_en","title_fr","image"},
     *       @OA\Property(property="hotel_name", type="string", format="text",example="john service"),
     *       @OA\Property(property="title_en", type="string", format="text",example="winner kambale"),
     *       @OA\Property(property="title_fr", type="string", format="text",example="rdc"),
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
    public function storeSlide(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title_en' => 'required',
            'title_fr' => 'required',
            'hotel_name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Les données envoyées ne sont pas valides.',
                'errors' => $validator->errors()
            ], 422);
        }
        $file = $request->file('image');
        $path = $file->store('images/slide', 'public');
        Slide::create([
            'hotel_name' => $request->hotel_name,
            'title_en' => $request->title_en,
            'title_fr' => $request->title_fr,
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
     * path="/api/updateSlide/{id}",
     * summary="Update",
     * description="Modification",
     * security={{ "bearerAuth":{ }}},
     * operationId="updateSlide",
     * tags={"Slide"},
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
     *       required={"title_en","title_fr","hotel_name"},
     *       @OA\Property(property="hotel_name", type="string", format="text", example="winner services"),
     *       @OA\Property(property="title_en", type="string", format="text", example="winner kambale"),
     *       @OA\Property(property="title_fr", type="string", format="text", example="rdc"),
     *       @OA\Property(property="image", type="string", format="text", example="rdc"),
     *    ),
     * ),
     * @OA\Response(
     *    response=200,
     *    description="success",
     * ),
     * @OA\Response(
     *    response=404,
     *    description="Slide not found",
     * ),
     * @OA\Response(
     *    response=422,
     *    description="Validation error",
     * )
     * )
     */
    public function updateSlide(Request $request, $id)
    {
        $slide = Slide::find($id);

        if (!$slide) {
            return response()->json(['message' => 'Slide not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'hotel_name' => 'required',
            'title_en' => 'required',
            'title_fr' => 'required',
            'image' => 'nullable',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Les données envoyées ne sont pas valides.',
                'errors' => $validator->errors()
            ], 422);
        }

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($slide->image);

            $file = $request->file('image');
            $path = $file->store('images/slide', 'public');
        } else {
            $path = $slide->image;
        }

        $slide->update([
            'hotel_name' => $request->hotel_name,
            'title_en' => $request->title_en,
            'title_fr' => $request->title_fr,
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
     * path="/api/deleteSlide/{id}",
     * summary="Delete",
     * description="Suppression",
     * security={{ "bearerAuth":{ }}},
     * operationId="deleteSlide",
     * tags={"Slide"},
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
    public function deleteSlide($id)
    {
        $slide = Slide::find($id);

        if (!$slide) {
            return response()->json(['message' => 'Slide not found'], 404);
        }
        Storage::disk('public')->delete($slide->image);

        $slide->delete();

        return response()->json([
            'message' => "Slide deleted successfully",
            'success' => true,
            'status' => 200
        ]);
    }
    /**
     * @OA\Get(
     *     path="/api/getSingleSlide/{id}",
     *     summary="Afficher",
     *     description="Afficher ",
     *     security={{"bearerAuth":{}}},
     *     operationId="getSingleSlide",
     *     tags={"Slide"},
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
    public function getSingleSlide($id)
    {
        $data = Slide::find($id);
        $result = [
            'message' => "success",
            'success' => true,
            'status' => 200,
            'data' => $data
        ];
        return response()->json($result);
    }
}


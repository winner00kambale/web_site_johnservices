<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use App\Models\Slide_Restau;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SlideRestauController extends Controller
{
    /**
     * @OA\Post(
     * path="/api/createSlideRestau",
     * summary="Create",
     * description="Creation",
     * security={{ "bearerAuth":{ }}},
     * operationId="createSlideRestau",
     * tags={"Slide Restaurant"},
     * @OA\RequestBody(
     *    required=true,
     *    description="Enregistrer",
     *    @OA\JsonContent(
     *       required={"image"},
     *       @OA\Property(property="image", type="string", format="text",example="imagerdc")
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
    public function createSlideRestau(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Le donnée envoyée n/est pas valides.',
                'errors' => $validator->errors()
            ], 422);
        }
        $file = $request->file('image');
        $path = $file->store('images/slideRestau', 'public');
        Slide_Restau::create([
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
     * path="/api/updateSlideRestau/{id}",
     * summary="Update",
     * description="Modification",
     * security={{ "bearerAuth":{ }}},
     * operationId="updateSlideRestau",
     * tags={"Slide Restaurant"},
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
     *       required={"image"},
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
    public function updateSlideRestau(Request $request, $id)
    {
        $slide = Slide_Restau::find($id);

        if (!$slide) {
            return response()->json(['message' => 'Slide not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'image' => 'nullable',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Le donnée envoyée n/est pas valides.',
                'errors' => $validator->errors()
            ], 422);
        }

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($slide->image);

            $file = $request->file('image');
            $path = $file->store('images/slideRestau', 'public');
        } else {
            $path = $slide->image;
        }

        $slide->update([
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
     * @OA\Get(
     *      path="/api/getAllSlideRestauData",
     *      operationId="getAllSlideRestauData",
     *      tags={"Slide Restaurant"},
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
    public function getAllSlideRestauData()
    {
        $slides = Slide_Restau::inRandomOrder()->get();

        $result = [
            'message' => "success",
            'success' => true,
            'status' => 200,
            'data' => $slides
        ];

        return response()->json($result);
    }

    /**
     * @OA\Get(
     *      path="/api/getOneSildeRestau",
     *      operationId="getOneSildeRestau",
     *      tags={"Slide Restaurant"},
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
    public function getOneSildeRestau()
    {
        $data = Slide_Restau::inRandomOrder()->take(1)->get();
        $result = [
            'message' => "success",
            'success' => true,
            'status' => 200,
            'data' => $data
        ];
        return response()->json($result);
    }

    /**
     * @OA\Delete(
     * path="/api/deleteSlideRestau/{id}",
     * summary="Delete",
     * description="Suppression",
     * security={{ "bearerAuth":{ }}},
     * operationId="deleteSlideRestau",
     * tags={"Slide Restaurant"},
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
    public function deleteSlideRestau($id)
    {
        $slide = Slide_Restau::find($id);

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

}

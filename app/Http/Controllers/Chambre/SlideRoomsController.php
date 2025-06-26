<?php

namespace App\Http\Controllers\Chambre;

use App\Http\Controllers\Controller;
use App\Models\SlideRooms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Storage;

class SlideRoomsController extends Controller
{
    /**
     * @OA\Post(
     * path="/api/createSlideRoom",
     * summary="Create",
     * description="Creation",
     * security={{ "bearerAuth":{ }}},
     * operationId="createSlideRoom",
     * tags={"Slide Chambre"},
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
    public function createSlideRoom(Request $request)
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
        $path = $file->store('images/slideRoom', 'public');
        SlideRooms::create([
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
     * path="/api/updateSlideRoom/{id}",
     * summary="Update",
     * description="Modification",
     * security={{ "bearerAuth":{ }}},
     * operationId="updateSlideRoom",
     * tags={"Slide Chambre"},
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
    public function updateSlideRoom(Request $request, $id)
    {
        $slide = SlideRooms::find($id);

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
            $path = $file->store('images/slideRoom', 'public');
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
     *      path="/api/getAllSlideRoomData",
     *      operationId="getAllSlideRoomData",
     *      tags={"Slide Chambre"},
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
    public function getAllSlideRoomData()
    {
        $images = SlideRooms::inRandomOrder()->get();

        $result = [
            'message' => "success",
            'success' => true,
            'status' => 200,
            'data' => $images
        ];

        return response()->json($result);
    }
    /**
     * @OA\Get(
     *      path="/api/getOneSildeRoom",
     *      operationId="getOneSildeRoom",
     *      tags={"Slide Chambre"},
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
    public function getOneSildeRoom()
    {
        $data = SlideRooms::inRandomOrder()->take(1)->get();
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
     * path="/api/deleteSlideRoom/{id}",
     * summary="Delete",
     * description="Suppression",
     * security={{ "bearerAuth":{ }}},
     * operationId="deleteSlideRoom",
     * tags={"Slide Chambre"},
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
    public function deleteSlideRoom($id)
    {
        $slide = SlideRooms::find($id);

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

<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Models\OtherService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class OtherServiceController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/getOtherServicesData",
     *      operationId="getOtherServicesData",
     *      tags={"Autres Service"},
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
    public function getOtherServicesData()
    {
        $data = OtherService::inRandomOrder()->get();
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
     * path="/api/createOtherService",
     * summary="Create",
     * description="Creation",
     * security={{ "bearerAuth":{ }}},
     * operationId="createOtherService",
     * tags={"Autres Service"},
     * @OA\RequestBody(
     *    required=true,
     *    description="Enregistrer",
     *    @OA\JsonContent(
     *       required={"title_en","title_fr","description_fr","description_en"},
     *       @OA\Property(property="title_en", type="string", format="text",example="rdc"),
     *       @OA\Property(property="title_fr", type="string", format="text",example="rdc"),
     *       @OA\Property(property="description_fr", type="string", format="text",example="winner kambale"),
     *       @OA\Property(property="description_en", type="string", format="text",example="rdc"),
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
    public function createOtherService(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title_en' => 'required',
            'title_fr' => 'required',
            'description_fr' => 'required',
            'description_en' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'flaticon' => 'nullable'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Les données envoyées ne sont pas valides.',
                'errors' => $validator->errors()
            ], 422);
        }
        $file = $request->file('image');
        $path = $file->store('images/OtherService', 'public');
        OtherService::create([
            'title_en' => $request->title_en,
            'title_fr' => $request->title_fr,
            'description_fr' => $request->description_fr,
            'description_en' => $request->description_en,
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
     * path="/api/updateOtherService/{id}",
     * summary="Update",
     * description="Modification",
     * security={{ "bearerAuth":{ }}},
     * operationId="updateOtherService",
     * tags={"Autres Service"},
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
     *       required={"title_en","title_fr","description_fr","description_en"},
     *       @OA\Property(property="description_fr", type="string", format="text", example="winner services"),
     *       @OA\Property(property="description_en", type="string", format="text", example="winner services"),
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
     *    description="Service not found",
     * ),
     * @OA\Response(
     *    response=422,
     *    description="Validation error",
     * )
     * )
     */
    public function updateOtherService(Request $request, $id)
    {
        $service = OtherService::find($id);

        if (!$service) {
            return response()->json(['message' => 'service not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'title_en' => 'required',
            'title_fr' => 'required',
            'description_fr' => 'required',
            'description_en' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'flaticon' => 'nullable'
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
            $path = $file->store('images/OtherService', 'public');
        } else {
            $path = $service->image;
        }

        $service->update([
            'title_en' => $request->title_en,
            'title_fr' => $request->title_fr,
            'description_fr' => $request->description_fr,
            'description_en' => $request->description_en,
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
     * path="/api/deleteOtheService/{id}",
     * summary="Delete",
     * description="Suppression",
     * security={{ "bearerAuth":{ }}},
     * operationId="deleteOtheService",
     * tags={"Autres Service"},
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
    public function deleteOtheService($id)
    {
        $service = OtherService::find($id);

        if (!$service) {
            return response()->json(['message' => 'service not found'], 404);
        }
        Storage::disk('public')->delete($service->image);

        $service->delete();

        return response()->json([
            'message' => "Slide deleted successfully",
            'success' => true,
            'status' => 200
        ]);
    }
}

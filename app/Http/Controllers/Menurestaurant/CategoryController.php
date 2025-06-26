<?php

namespace App\Http\Controllers\Menurestaurant;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/getCategoryData",
     *      operationId="getCategoryData",
     *      tags={"Menu"},
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
    public function getCategoryData()
    {
        $data = Category::latest()->get();
        $result = [
            'message' => 'success',
            'success' => true,
            'status' => 201,
            'data' => $data
        ];
        return response()->json($result);
    }

    /**
     * @OA\Post(
     * path="/api/createCategory",
     * summary="Create",
     * description="Creation",
     * security={{ "bearerAuth":{ }}},
     * operationId="createCategory",
     * tags={"Menu"},
     * @OA\RequestBody(
     *    required=true,
     *    description="Enregistrer",
     *    @OA\JsonContent(
     *       required={"designation_en","designation_fr"},
     *       @OA\Property(property="designation_en", type="string", format="text",example="wine"),
     *       @OA\Property(property="designation_fr", type="string", format="text",example="vin"),
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
    public function createCategory(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'designation_en' => 'required|string|max:255',
            'designation_fr' => 'required|string|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Les données envoyées ne sont pas valides.',
                'errors' => $validator->errors()
            ], 422);
        }

        $category = Category::where('designation_en', $request->designation_en)
            ->orWhere('designation_en', $request->designation_fr)
            ->first();

        if ($category) {
            return response()->json([
                'message' => 'La catégorie existe déjà.',
            ], 200);
        }

        $categ = new Category();
        $categ->designation_en = $request->designation_en;
        $categ->designation_fr = $request->designation_fr;
        $categ->save();

        return response()->json([
            'message' => 'Catégorie créée avec succès.',
            'success' => true,
            'status' => 200
        ], 200);
    }

    /**
     * @OA\Put(
     * path="/api/updateCategory/{id}",
     * summary="Update",
     * description="Modification",
     * security={{ "bearerAuth":{ }}},
     * operationId="updateCategory",
     * tags={"Menu"},
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
     *       @OA\Property(property="designation_en", type="string", format="text",example="wine"),
     *       @OA\Property(property="designation_fr", type="string", format="text",example="vin"),
     *    ),
     * ),
     * @OA\Response(
     *    response=200,
     *    description="success",
     * ),
     * @OA\Response(
     *    response=404,
     *    description="faqs not found",
     * ),
     * @OA\Response(
     *    response=422,
     *    description="Validation error",
     * )
     * )
     */
    public function updateCategory(Request $request, $id)
    {
        $categ = Category::find($id);
        if (!$categ) {
            return response()->json(['message' => 'categ not found'], 404);
        }
        $validator = Validator::make($request->all(), [
            'designation_en' => 'required|string|max:255',
            'designation_fr' => 'required|string|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Les données envoyées ne sont pas valides.',
                'errors' => $validator->errors()
            ], 422);
        }
        $categ->update([
            'designation_en' => $request->designation_en,
            'designation_fr' => $request->designation_fr
        ]);
        return response()->json([
            'message' => 'succès.',
            'success' => true,
            'status' => 200
        ], 200);
    }

}

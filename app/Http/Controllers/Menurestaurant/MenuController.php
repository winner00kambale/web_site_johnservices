<?php

namespace App\Http\Controllers\Menurestaurant;

use App\Http\Controllers\Controller;
use App\Models\MenuRestau;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MenuController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/getMenuData",
     *      operationId="getMenuData",
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
    public function getMenuData()
    {
        $data = MenuRestau::join('categories', 'categories.id', '=', 'menu_restaus.category_id')
            ->select('menu_restaus.*', 'categories.designation_en', 'categories.designation_fr')->get();
        $result = [
            'message' => 'success',
            'success' => true,
            'status' => 201,
            'data' => $data
        ];
        return response()->json($result);
    }
    /**
     * @OA\Get(
     *      path="/api/getMenuRestauByCategory/{id?}",
     *      operationId="getMenuRestauByCategory",
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
    public function getMenuRestauByCategory($id = 1)
    {
        $data = MenuRestau::join('categories', 'categories.id', '=', 'menu_restaus.category_id')
            ->where('category_id', $id)
            ->select('menu_restaus.*', 'categories.designation_en', 'categories.designation_fr')
            ->get();

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
     * path="/api/createMenu",
     * summary="Create",
     * description="Creation",
     * security={{ "bearerAuth":{ }}},
     * operationId="createMenu",
     * tags={"Menu"},
     * @OA\RequestBody(
     *    required=true,
     *    description="Enregistrer",
     *    @OA\JsonContent(
     *       required={"category_id","designation","price"},
     *       @OA\Property(property="designation", type="string", format="text",example="wine"),
     *       @OA\Property(property="category_id", type="integer", format="number",example=1),
     *       @OA\Property(property="price", type="integer", format="number",example=1)
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
    public function createMenu(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
            'designation' => 'required',
            'price' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Les données envoyées ne sont pas valides.',
                'errors' => $validator->errors()
            ], 422);
        }
        $menu = MenuRestau::where('designation', $request->designation)->first();
        if ($menu) {
            return response()->json([
                'message' => 'La catégorie existe déjà.',
            ], 200);
        }
        $menuRestau = new MenuRestau();
        $menuRestau->category_id = $request->category_id;
        $menuRestau->designation = $request->designation;
        $menuRestau->price = $request->price;
        $menuRestau->save();
        return response()->json([
            'message' => 'succès.',
            'success' => true,
            'status' => 201
        ], 200);
    }
    /**
     * @OA\Put(
     * path="/api/updateMenu/{id}",
     * summary="Update",
     * description="Modification",
     * security={{ "bearerAuth":{ }}},
     * operationId="updateMenu",
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
     *       required={"category_id","designation","price"},
     *       @OA\Property(property="designation", type="string", format="text",example="wine"),
     *       @OA\Property(property="category_id", type="integer", format="number",example=1),
     *       @OA\Property(property="price", type="integer", format="number",example=1)
     *    ),
     * ),
     * @OA\Response(
     *    response=200,
     *    description="success",
     * ),
     * @OA\Response(
     *    response=404,
     *    description="menu not found",
     * ),
     * @OA\Response(
     *    response=422,
     *    description="Validation error",
     * )
     * )
     */
    public function updateMenu(Request $request, $id)
    {
        $menu = MenuRestau::find($id);
        if (!$menu) {
            return response()->json(['message' => 'menu not found'], 404);
        }
        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
            'designation' => 'required',
            'price' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Les données envoyées ne sont pas valides.',
                'errors' => $validator->errors()
            ], 422);
        }
        $menu->update([
            'category_id' => $request->category_id,
            'designation' => $request->designation,
            'price' => $request->price
        ]);
        return response()->json([
            'message' => 'succès.',
            'success' => true,
            'status' => 200
        ], 200);
    }
}

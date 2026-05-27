<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use OpenApi\Annotations as OA;

class CategoryController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/categories",
     *     operationId="getCategories",
     *     tags={"Categories"},
     *     summary="Get all categories",
     *     @OA\Response(
     *         response=200,
     *         description="List of categories",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(
     *                 @OA\Property(property="id", type="integer", example=1),
     *                 @OA\Property(property="name", type="string", example="Electronics"),
     *                 @OA\Property(property="slug", type="string", example="electronics"),
     *                 @OA\Property(property="product_count", type="integer", example=15)
     *             )
     *         )
     *     )
     * )
     */
    public function index()
    {
        return response()->json([
            ["id" => 1, "name" => "Electronics", "slug" => "electronics", "product_count" => 15],
            ["id" => 2, "name" => "Accessories", "slug" => "accessories", "product_count" => 8],
            ["id" => 3, "name" => "Clothing", "slug" => "clothing", "product_count" => 12],
            ["id" => 4, "name" => "Books", "slug" => "books", "product_count" => 20]
        ]);
    }

    /**
     * @OA\Get(
     *     path="/api/categories/{id}",
     *     operationId="getCategoryById",
     *     tags={"Categories"},
     *     summary="Get single category details",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Category ID",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Category details",
     *         @OA\JsonContent(
     *             @OA\Property(property="id", type="integer", example=1),
     *             @OA\Property(property="name", type="string", example="Electronics"),
     *             @OA\Property(property="slug", type="string", example="electronics"),
     *             @OA\Property(property="product_count", type="integer", example=15),
     *             @OA\Property(property="description", type="string", example="Electronic items")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Category not found"
     *     )
     * )
     */
    public function show($id)
    {
        $categories = [
            1 => ["id" => 1, "name" => "Electronics", "slug" => "electronics", "product_count" => 15, "description" => "Electronic items"],
            2 => ["id" => 2, "name" => "Accessories", "slug" => "accessories", "product_count" => 8, "description" => "Gadget accessories"],
            3 => ["id" => 3, "name" => "Clothing", "slug" => "clothing", "product_count" => 12, "description" => "Fashion items"],
            4 => ["id" => 4, "name" => "Books", "slug" => "books", "product_count" => 20, "description" => "Educational books"]
        ];
        
        if (isset($categories[$id])) {
            return response()->json($categories[$id]);
        }
        
        return response()->json(["message" => "Category not found"], 404);
    }
}
<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

class ProductController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/products",
     *     operationId="getProducts",
     *     tags={"Products"},
     *     summary="Get list of products",
     *     @OA\Response(
     *         response=200,
     *         description="Successful response",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(
     *                 @OA\Property(property="id", type="integer", example=1),
     *                 @OA\Property(property="name", type="string", example="Gaming Laptop"),
     *                 @OA\Property(property="price", type="integer", example=75000),
     *                 @OA\Property(property="category", type="string", example="Electronics")
     *             )
     *         )
     *     )
     * )
     */
    public function index()
    {
        return response()->json([
            ["id" => 1, "name" => "Gaming Laptop", "price" => 75000, "category" => "Electronics"],
            ["id" => 2, "name" => "Smartphone", "price" => 25000, "category" => "Electronics"],
            ["id" => 3, "name" => "Wireless Headphones", "price" => 2999, "category" => "Accessories"],
            ["id" => 4, "name" => "Smart Watch", "price" => 15999, "category" => "Accessories"],
            ["id" => 5, "name" => "Tablet", "price" => 35000, "category" => "Electronics"]
        ]);
    }

    /**
     * @OA\Post(
     *     path="/api/products",
     *     operationId="createProduct",
     *     tags={"Products"},
     *     summary="Create new product",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name","price"},
     *             @OA\Property(property="name", type="string", example="New Product"),
     *             @OA\Property(property="price", type="integer", example=10000),
     *             @OA\Property(property="category", type="string", example="Electronics")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Product created successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="id", type="integer", example=100),
     *             @OA\Property(property="name", type="string", example="New Product"),
     *             @OA\Property(property="price", type="integer", example=10000),
     *             @OA\Property(property="message", type="string", example="Product created successfully")
     *         )
     *     )
     * )
     */
    public function store(Request $request)
    {
        return response()->json([
            "id" => rand(100, 999),
            "name" => $request->name,
            "price" => $request->price,
            "category" => $request->category ?? "General",
            "message" => "Product created successfully"
        ], 201);
    }
}
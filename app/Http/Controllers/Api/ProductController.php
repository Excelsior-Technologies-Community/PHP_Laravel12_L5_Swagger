<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use OpenApi\Annotations as OA;

class ProductController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/products",
     *     tags={"Products"},
     *     summary="Get all products with search & pagination",
     *     @OA\Parameter(
     *         name="search",
     *         in="query",
     *         description="Search product by name",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="page",
     *         in="query",
     *         description="Pagination page number",
     *         required=false,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response=200, description="Success")
     * )
     */
    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->search) {
            $query->where('name', 'LIKE', '%' . $request->search . '%');
        }

        return response()->json($query->paginate(5));
    }

    /**
     * @OA\Post(
     *     path="/api/products",
     *     tags={"Products"},
     *     summary="Create product",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name","price"},
     *             @OA\Property(property="name", type="string", example="Laptop"),
     *             @OA\Property(property="price", type="integer", example=50000)
     *         )
     *     ),
     *     @OA\Response(response=200, description="Created")
     * )
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required'
        ]);

        return Product::create($request->all());
    }
}
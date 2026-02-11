<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

class SwaggerTestController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/test",
     *     summary="Test API",
     *     tags={"Test"},
     *     @OA\Response(
     *         response=200,
     *         description="Success"
     *     )
     * )
     */
    public function test()
    {
        return response()->json([
            "message" => "Swagger working"
        ]);
    }
}

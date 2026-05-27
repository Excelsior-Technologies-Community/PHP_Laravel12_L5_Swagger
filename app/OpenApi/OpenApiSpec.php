<?php

namespace App\OpenApi;

use OpenApi\Annotations as OA;

/**
 * @OA\Info(
 *     version="1.0.0",
 *     title="Laravel 12 Swagger API",
 *     description="Complete API with Users, Products, Categories"
 * )
 *
 * @OA\Server(
 *     url="http://localhost:8000/api",
 *     description="Local Server"
 * )
 *
 * @OA\Tag(
 *     name="Users",
 *     description="User management endpoints"
 * )
 * @OA\Tag(
 *     name="Products",
 *     description="Product management endpoints"
 * )
 * @OA\Tag(
 *     name="Categories",
 *     description="Category management endpoints"
 * )
 * @OA\Tag(
 *     name="Test",
 *     description="Test endpoints"
 * )
 */
class OpenApiSpec {

}
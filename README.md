# PHP_Laravel12_L5_Swagger

##  Project Overview

PHP_Laravel12_L5_Swagger is a Laravel 12 project integrated with **L5-Swagger** to generate automatic API documentation using OpenAPI (Swagger).

This project demonstrates how to:

- Install L5-Swagger in Laravel 12
- Configure Swagger properly
- Generate API documentation
- View interactive Swagger UI


## Features

- Automatic API documentation generation
- OpenAPI 3 specification support
- Interactive Swagger UI
- Auto-regeneration in development mode
- Clean Laravel 12 structure


## Technologies Used

- PHP 8.2+
- Laravel 12
- L5-Swagger (^9.0)
- swagger-php (^5.x)


## Requirements

Make sure you have installed:

- PHP 8.2 or higher
- Composer
- MySQL (optional)
- XAMPP / Laragon / Local server



---

#  Full Step-by-Step Setup (Laravel 12 + L5-Swagger)

---


## STEP 1: Create Laravel 12 Project

### Open terminal / CMD and run:

```
composer create-project laravel/laravel PHP_Laravel12_L5_Swagger "12.*"

```

### Go inside project:

```
cd PHP_Laravel12_L5_Swagger

```

#### Explanation: 

This command installs a fresh Laravel 12 application using Composer.

The `"12.*"` ensures that version 12 of Laravel is installed.




## STEP 2: Database setup optional (not required for demo APIs)

### Open .env and set:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel12_L5_Swagger
DB_USERNAME=root
DB_PASSWORD=

```

### Create database in MySQL / phpMyAdmin:

```
Database name: laravel12_L5_Swagger

```

**Why this step?**

Database setup is optional for this demo because we are returning static JSON data.

However, in real-world projects, APIs usually connect to a database.
So configuring the database prepares your project for future expansion.



## STEP 3: Install L5-Swagger Package

### Install the latest L5-Swagger (version 9.x supports Laravel 12):

```
composer require darkaonline/l5-swagger:^9.0 -W

```

**Why this step?**

This installs the L5-Swagger package which integrates Swagger (OpenAPI)
with Laravel.

The `-W` flag allows Composer to update dependencies if required.




## STEP 4: Publish L5-Swagger Config

### Publish config files so you can customize documentation settings:

```
php artisan vendor:publish --provider "L5Swagger\L5SwaggerServiceProvider"

```

### This creates the file:

```
config/l5-swagger.php

```

**Why this step?**

Publishing the configuration file allows you to customize:

- Documentation routes
- Swagger UI settings
- File generation paths
- API scanning locations



## STEP 5: Create OpenAPI Specification File

### Create:

```
app/OpenApi/OpenApiSpec.php

```

### Add global Swagger configuration:

```

<?php

namespace App\OpenApi;

use OpenApi\Annotations as OA;

/**
 * @OA\Info(
 *     version="1.0.0",
 *     title="Laravel 12 Swagger API"
 * )
 *
 * @OA\Server(
 *     url="http://localhost:8000",
 *     description="Local Server"
 * )
 */
class OpenApiSpec {

}

```

**Why this step?**

This file defines global OpenAPI information like:

- API Title
- Version
- Server URL

 Important: `@OA\Info()` must be defined only once in the entire project.




## STEP 6: Add Environment Variables

### Edit your .env file and add:

```
L5_SWAGGER_CONST_HOST=http://localhost:8000/api

L5_SWAGGER_GENERATE_ALWAYS=true

```

**Why this step?**

These environment variables help control Swagger behavior.

- `L5_SWAGGER_CONST_HOST` sets the base API URL.

- `L5_SWAGGER_GENERATE_ALWAYS=true` regenerates documentation automatically during development.





## STEP 7: Create API Controller

### Create a controller for your API endpoints:

```
php artisan make:controller Api/UserController

```

### Now edit app/Http/Controllers/Api/UserController.php.

```

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use OpenApi\Annotations as OA;

class UserController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/users",
     *     operationId="getUsers",
     *     tags={"Users"},
     *     summary="Get list of users",
     *     @OA\Response(
     *         response=200,
     *         description="Successful response"
     *     )
     * )
     */
    public function index()
    {
        return response()->json([
            ["id" => 1, "name" => "Alice"],
            ["id" => 2, "name" => "Bob"]
        ]);
    }
}

```

**Why this step?**

Swagger annotations inside the controller describe the API endpoint.

These annotations define:

- HTTP method
- Endpoint path
- Tags
- Response structure

L5-Swagger scans these annotations to generate API documentation.







## STEP 8: Create Test API Controller

### Run:

```
php artisan make:controller SwaggerTestController

```

### Now edit app/Http/Controllers/SwaggerTestController.php

```

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

```

**Why this step?**

This is a simple test endpoint to verify that:

- Swagger is working correctly
- Documentation generation is successful
- API routes are accessible



## STEP 9: Define API Route

### Open routes/api.php and add this:

```
<?php

use App\Http\Controllers\SwaggerTestController;
use App\Http\Controllers\Api\UserController;


Route::get('/test', [SwaggerTestController::class, 'test']);
Route::get('/users', [UserController::class, 'index']);

```

**Why this step?**

Routes connect the API endpoints to their respective controller methods.

Since these are API routes, they are defined inside `routes/api.php`.



## STEP 10: Generate Swagger Documentation

### Run:

```
php artisan l5-swagger:generate

```
**Why this step?**

This command scans all Swagger annotations in your project
and generates the OpenAPI JSON file inside:

storage/api-docs/api-docs.json



## STEP 11: Run Application

### Run:

```
php artisan serve

```

### Open in browser:

```
http://localhost:8000/api/documentation

```

**Why this step?**

This starts Laravel’s local development server.

After running it, you can access the Swagger UI in your browser and test APIs interactively.



##  Swagger UI Screenshots

### Main Documentation Dashboard:


<img width="1909" height="965" alt="Screenshot 2026-02-11 104239" src="https://github.com/user-attachments/assets/eae4bbfe-741f-4bb4-a4ac-e16feeb8d481" />


### Users API Endpoint:


<img width="1887" height="956" alt="Screenshot 2026-02-11 104254" src="https://github.com/user-attachments/assets/9d6a082c-417d-4157-8e80-62e0cea5d7c5" />


### Test API Endpoint:


<img width="1895" height="960" alt="Screenshot 2026-02-11 104314" src="https://github.com/user-attachments/assets/472e10be-f555-4f7e-91c4-ad5609d7df66" />



---

# Project Folder Structure:

```

PHP_Laravel12_L5_Swagger/
│
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── SwaggerTestController.php
│   │       └── Api/
│   │           └── UserController.php
│   │
│   └── OpenApi/
│       └── OpenApiSpec.php
│
├── bootstrap/
│
├── config/
│   └── l5-swagger.php
│
├── database/
│
├── public/
│
├── resources/
│
├── routes/
│   ├── api.php
│   └── web.php
│
├── storage/
│   └── api-docs/
│       └── api-docs.json   (Generated Swagger JSON)
│
├── .env
├── composer.json
├── artisan
└── README.md
```

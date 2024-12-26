<?php

use App\Http\Controllers\API\Controller_Products;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
// return $request->user();
// });

//doesn't work with ruta/api/getproducts so i just use web.php por the routes
 Route::controller(Controller_Products::class)->group(function () { 
     Route::get('/getprods',  'getProducts');
     Route::post("/",  "createProduct");
     Route::put("/",  "updateProduct");
     Route::delete("/", "deleteProduct");
  });

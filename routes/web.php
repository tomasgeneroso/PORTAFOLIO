<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Controller_Products;
Route::get('/', function () {
    return view('welcome');
});

//doesn't work with ruta/api/getproducts so i just use web.php por the routes
//!Intentar poner luego el prefix
Route::controller(Controller_Products::class)->group(function () { 
    Route::get('/getproducts','getProducts');
    Route::post("/createproduct", "createProduct");
    Route::put("/updateproduct", "updateProduct");
    Route::delete("/deleteproduct",  "deleteProduct");
});
<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Controller_Products;

//doesn't work with ruta/api/getproducts so I just use web.php por the routes
//!Intentar poner luego el prefix
Route::controller(Controller_Products::class)->group(function () { 
    Route::get('/','getProducts');
    Route::post("/", "createProduct");
    Route::post("/incrementstock/{id}", "incrementStock");
    Route::post("/decrementstock/{id}", "decrementStock");
    Route::post("/{id}",  "deleteProduct");
});
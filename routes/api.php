<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller_Products;

Route::prefix("/api")->group(function () {
    Route::get("/", [Controller_Products::class, "getProducts"]);
    Route::post("/", [Controller_Products::class, "createProduct"]);
    Route::put("/", [Controller_Products::class, "updateProduct"]);
    Route::delete("/", [Controller_Products::class, "deleteProduct"]);
});

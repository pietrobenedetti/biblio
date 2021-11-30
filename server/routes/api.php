<?php

use App\Http\Controllers\BookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get("/list", [BookController::class, "list"]);

Route::get("/view/{id}", [BookController::class, "view"]);

Route::post("/create", [BookController::class, "create"]);

Route::delete("/delete/{id}", [BookController::class, "delete"]);

Route::put("/edit/{id}", [BookController::class, "edit"]);

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\FournisseurController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('produits', ProduitController::class);
Route::resource('categories', CategorieController::class);
Route::resource('fournisseurs', FournisseurController::class);
Route::resource('commandes', CommandeController::class);
Route::resource('clients', ClientController::class);


Route::prefix('api')->middleware('auth:sanctum')->group(function () {
    Route::get('/user', [AuthController::class, 'user']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

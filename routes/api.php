<?php

use App\Http\Controllers\AluguelController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/users', [UserController::class, 'index']);
Route::post('/users', [UserController::class, 'store']);
Route::put('/users/{user}', [UserController::class, 'update']);
Route::delete('/users/{user}', [UserController::class, 'destroy']);

Route::get('/livros', [LivroController::class, 'index']);
Route::post('/livros', [LivroController::class, 'store']);
Route::put('/livros/{livro}', [LivroController::class, 'update']);
Route::delete('/livros/{livro}', [LivroController::class, 'destroy']);

Route::get('/categorias', [CategoriaController::class, 'index']);
Route::post('/categorias', [CategoriaController::class, 'store']);
Route::put('/categorias/{categoria}', [CategoriaController::class, 'update']);
Route::delete('/categorias/{categoria}', [CategoriaController::class, 'destroy']);

Route::get('/alugueis', [AluguelController::class, 'index']);
Route::post('/alugueis', [AluguelController::class, 'store']);
Route::put('/alugueis/{aluguel}', [AluguelController::class, 'update']);
Route::delete('/alugueis/{aluguel}', [AluguelController::class, 'destroy']);

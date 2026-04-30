<?php

use App\Http\Controllers\AluguelController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CategoriaLivroController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

Route::post('/login', function (Request $request) {
    $data = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required', 'string'],
        'device_name' => ['required', 'string'],
    ]);

    $user = User::where('email', $data['email'])->first();

    if (! $user || ! Hash::check($data['password'], $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['Credenciais inválidas.'],
        ]);
    }

    $token = $user->createToken($data['device_name'])->plainTextToken;

    return response()->json([
        'message' => 'Login realizado com sucesso!',
        'token' => $token,
        'token_type' => 'Bearer',
        'user' => $user,
    ]);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/me', function (Request $request) {
        return response()->json([
            'message' => 'Usuário autenticado com sucesso!',
            'data' => $request->user(),
        ]);
    });

    Route::post('/logout', function (Request $request) {
        $user = $request->user();
        if (! $user) {
            return response()->json([
                'message' => 'Não autenticado!'
            ], 401);
        }

        $token = $user->currentAccessToken();
        if ($token) {
            $token->delete();
        }
        return response()->json([
            'message' => 'Logout realizado com sucesso!',
        ]);
    });

    Route::get('/users', [UserController::class, 'index']);
    Route::get('/users/{user}', [UserController::class, 'show']);
    Route::post('/users', [UserController::class, 'store']);
    Route::put('/users/{user}', [UserController::class, 'update']);
    Route::delete('/users/{user}', [UserController::class, 'destroy']);

    Route::get('/livros', [LivroController::class, 'index']);
    Route::get('/livros/{livro}', [LivroController::class, 'show']);
    Route::post('/livros', [LivroController::class, 'store']);
    Route::put('/livros/{livro}', [LivroController::class, 'update']);
    Route::delete('/livros/{livro}', [LivroController::class, 'destroy']);

    Route::get('/categorias', [CategoriaController::class, 'index']);
    Route::get('/categorias/{categoria}', [CategoriaController::class, 'show']);
    Route::post('/categorias', [CategoriaController::class, 'store']);
    Route::put('/categorias/{categoria}', [CategoriaController::class, 'update']);
    Route::delete('/categorias/{categoria}', [CategoriaController::class, 'destroy']);

    Route::get('/alugueis', [AluguelController::class, 'index']);
    Route::get('/alugueis/{aluguel}', [AluguelController::class, 'show']);
    Route::post('/alugueis', [AluguelController::class, 'store']);
    Route::put('/alugueis/{aluguel}', [AluguelController::class, 'update']);
    Route::delete('/alugueis/{aluguel}', [AluguelController::class, 'destroy']);

    Route::get('/categorias-livros', [CategoriaLivroController::class, 'index']);
    Route::get('/categorias-livros/{categoriaLivro}', [CategoriaLivroController::class, 'show']);
    Route::post('/categorias-livros', [CategoriaLivroController::class, 'store']);
    Route::put('/categorias-livros/{categoriaLivro}', [CategoriaLivroController::class, 'update']);
    Route::delete('/categorias-livros/{categoriaLivro}', [CategoriaLivroController::class, 'destroy']);
});

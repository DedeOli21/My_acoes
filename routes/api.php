<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarteiraController;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// List acoes
Route::get('acoes', [CarteiraController::class, 'index']);

// List single acoes
Route::get('acao/{id}', [CarteiraController::class, 'show']);

// adicionar new acao
Route::post('acao', [CarteiraController::class, 'store']);

// Update acao
Route::put('acao/{id}', [CarteiraController::class, 'update']);

// Delete acao
Route::delete('acao/{id}', [CarteiraController::class,'destroy']);

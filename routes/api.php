<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarteiraController;
use App\Http\Controllers\PainelController;
use App\Http\Controllers\HistoricoController;
use App\Http\Controllers\RentabilidadeController;



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// -----------------Registrar usuarios novos-------------
Route::post('login', [PainelController::class, 'login']);
Route::post('registrar', [PainelController::class, 'registrar']);



// List acoes
Route::get('acoes', [CarteiraController::class, 'index']);

// List single acoes
Route::get('acao/{id}', [CarteiraController::class, 'show']);

// adicionar new acao
Route::post('acao', [CarteiraController::class, 'investir']);

// Update acao
Route::put('acao/{id}', [CarteiraController::class, 'update']);

// Delete acao
Route::delete('acao/{id}', [CarteiraController::class,'destroy']);


//-------- Extrato --------------------

// List Um detalhe do extrato Todo

Route::get('historico', [HistoricoController::class, 'index']);

Route::get('historico/{id}', [HistoricoController::class, 'show']);

// adicionar new Historico
Route::post('historico', [HistoricoController::class, 'store']);

// Update acao
Route::put('historico/{id}', [HistoricoController::class, 'update']);

// Delete acao
Route::delete('historico/{id}', [HistoricoController::class,'destroy']);


// Rentabilidade
Route::get('rentabilidade', [RentabilidadeController::class, 'index']);

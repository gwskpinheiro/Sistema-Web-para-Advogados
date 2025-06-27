<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CasoController;
use App\Http\Controllers\ProcessoController;

// Página inicial redireciona para a home
Route::get('/', function () {
    return redirect()->route('home');
});

// Home principal com links para os CRUDs e agenda
Route::get('/home', function () {
    return view('home');
})->name('home');

// CRUDs completos
Route::resource('users', UserController::class);
Route::resource('clientes', ClienteController::class);
Route::resource('casos', CasoController::class);
Route::resource('processos', ProcessoController::class);

// Agenda integrada com eventos e atividades
Route::get('/agenda', [AgendaController::class, 'index'])->name('agenda.index');

// Perfil (mantido se for necessário)
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

require __DIR__.'/auth.php';

<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CasoController;
use App\Http\Controllers\ProcessoController;
use App\Http\Controllers\AgendaController;

use App\Http\Middleware\IsAdvogado; 

// Redireciona a raiz para o login
Route::get('/', fn () => redirect('/login'));

// Redirecionamento pós-login (padrão do Laravel Breeze)
Route::get('/dashboard', function () {
    if (Auth::check()) {
        return redirect()->route('advogado.home');
    }
    return redirect('/login');
})->middleware('auth')->name('dashboard');

// Rotas protegidas por autenticação e perfil de advogado
Route::middleware(['auth', IsAdvogado::class])->prefix('advogado')->name('advogado.')->group(function () {
    Route::get('/home', function () {
        return view('home');
    })->name('home');

    Route::resource('users', UserController::class);
    Route::resource('clientes', ClienteController::class);
    Route::resource('casos', CasoController::class);
    Route::resource('processos', ProcessoController::class);
    Route::get('agenda', [AgendaController::class, 'index'])->name('agenda.index');
});

// Perfil do usuário logado
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Autenticação Breeze (login, register etc.)
require __DIR__.'/auth.php';

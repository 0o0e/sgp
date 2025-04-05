<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CharacterController;
use App\Http\Controllers\FanartController;
use App\Http\Controllers\LoreController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

// Lore routes
Route::get('/lore', [LoreController::class, 'index'])->name('lore.index');

// Character routes
Route::get('/characters', [CharacterController::class, 'index'])->name('characters.index');
Route::get('/characters/create', [CharacterController::class, 'create'])->name('characters.create');
Route::get('/characters/create/guardian', [CharacterController::class, 'createGuardian'])->name('characters.create_guardian');
Route::get('/characters/create/child', [CharacterController::class, 'createChild'])->name('characters.create_child');
Route::post('/characters', [CharacterController::class, 'store'])->name('characters.store');
Route::get('/characters/{character}', [CharacterController::class, 'show'])->name('characters.show');
Route::get('/characters/{character}/edit', [CharacterController::class, 'edit'])->name('characters.edit');
Route::put('/characters/{character}', [CharacterController::class, 'update'])->name('characters.update');
Route::delete('/characters/{character}', [CharacterController::class, 'destroy'])->name('characters.destroy');

// Fanart routes
Route::get('/fanart', [FanartController::class, 'index'])->name('fanart.index');
Route::get('/fanart/create', [FanartController::class, 'create'])->name('fanart.create');
Route::post('/fanart', [FanartController::class, 'store'])->name('fanart.store');
Route::get('/fanart/{fanart}', [FanartController::class, 'show'])->name('fanart.show');
Route::delete('/fanart/{fanart}', [FanartController::class, 'destroy'])->name('fanart.destroy');


<?php

use App\Http\Controllers\ChurrascoController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

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
Route::post('/search', [ChurrascoController::class, 'search'])->name('churrasco.search');
Route::delete('/churrasco/{id}', [ChurrascoController::class, 'delete'])->name('churrasco.delete');
Route::put('/churrasco/{id}', [ChurrascoController::class, 'update'])->name('churrasco.update');
Route::get('/create', [ChurrascoController::class, 'create'])->name('churrasco.create');
Route::post('/index', [ChurrascoController::class, 'store'])->name('churrasco.store');
Route::get('/show/{id}', [ChurrascoController::class, 'show'])->name('churrasco.show');
Route::get('/edit/{id}', [ChurrascoController::class, 'edit'])->name('churrasco.edit');
Route::get('/index', [ChurrascoController::class, 'index'])->name('churrasco.index');
Route::get('/', [ChurrascoController::class, 'index'])->name('churrasco.index');

Route::get('usuario/create', [UsuarioController::class, 'create'])->name('usuario.create');
Route::get('usuario/index', [UsuarioController::class, 'index'])->name('usuario.index');
Route::post('usuario/index', [UsuarioController::class, 'store'])->name('usuario.store');
Route::get('usuario/show/{id}', [UsuarioController::class, 'show'])->name('usuario.show');
Route::get('usuario/edit/{id}', [UsuarioController::class, 'edit'])->name('usuario.edit');
Route::delete('usuario/{id}', [UsuarioController::class, 'destroy'])->name('usuario.delete');
Route::put('/usuario/{id}', [UsuarioController::class, 'update'])->name('usuario.update');
// Route::get('/', function () {
//     return view('index');
// });

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
Route::get('churrasco/create', [ChurrascoController::class, 'create'])->name('churrasco.create');
Route::post('/index', [ChurrascoController::class, 'store'])->name('churrasco.store');
Route::get('/show/{id}', [ChurrascoController::class, 'show'])->name('churrasco.show');
Route::get('/edit/{id}', [ChurrascoController::class, 'edit'])->name('churrasco.edit');
Route::get('/index', [ChurrascoController::class, 'index'])->name('churrasco.index');

Route::delete('usuario/{id}', [UsuarioController::class, 'destroy'])->name('usuario.delete');
Route::post('usuario/index', [UsuarioController::class, 'store'])->name('usuario.store');

Route::get('/register', [UsuarioController::class, 'register'])->name('auth.register');
Route::get('/forgot', [UsuarioController::class, 'forgot'])->name('auth.forgot');
Route::get('/reset', [UsuarioController::class, 'reset'])->name('auth.reset');
Route::post('/login', [UsuarioController::class, 'loginUser'])->name('auth.login');

Route::group(['middleware'=>['LoginCheck']], function(){
    Route::get('/', [UsuarioController::class, 'login'])->name('usuario.login');
    Route::get('/logout', [UsuarioController::class, 'logoutUser'])->name('auth.logout');
    Route::get('/profile', [UsuarioController::class, 'profile'])->name('profile');
    Route::post('/profile-image', [UsuarioController::class, 'profileImageUpdate'])->name('profile.image');
    Route::post('/profile-update', [UsuarioController::class, 'profileUpdate'])->name('profile.update');
});




<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\user\UserRecipeController;

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

Route::get('/', [RecipeController::class, 'index'])->name('recipes');
Route::get('/recipes/{recipe:slug}', [RecipeController::class, 'show'])->name('recipe');

Route::get('/register', [RegisterController::class, 'index'])->name('register.index')->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/login', [LoginController::class, 'index'])->name('login.index')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::prefix('dashboard')
    ->middleware('isUser')
    ->group(function() {
        Route::get('/', function() {
            return view('user.index');
        })->name('user.index');
        Route::resource('/recipes', UserRecipeController::class, [
            'names' => [
                'index' => 'user.recipes.index',
                'create' => 'user.recipes.create',
                'store' => 'user.recipes.store',
                'show' => 'user.recipes.show',
                'destroy' => 'user.recipes.destroy',
            ]
        ])->only(['index', 'create', 'store', 'show', 'destroy']);
    });
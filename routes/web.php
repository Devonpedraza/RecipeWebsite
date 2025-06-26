<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\recipeController;
use App\Http\Controllers\authController;

Route::get('/', [recipeController::class, 'index'])->name('recipes.index');

Route::get('/recipes', [recipeController::class, 'showall'])->name('recipes.recipes');

Route::get('/myrecipes', [recipeController::class, 'myrecipes'])->name('recipes.myrecipes');

Route::get('/myrecipes/create', [recipeController::class, 'create'])->name('recipes.create');

Route::get('/recipes/{id}', [recipeController::class, 'show'])->name('recipes.show');

Route::get('/recipes/{id}/instructions', [recipeController::class, 'show'])->name('recipes.instructions');

Route::get('/about', function () {
    return view('recipes.about');
});
Route::post('/myrecipes', [recipeController::class, 'store'])->name('recipes.store');

Route::post('/recipes/{id}/favorite', [recipeController::class, 'favorite'])->name('recipes.favorite');
Route::delete('/recipes/{id}/unfavorite', [recipeController::class, 'unfavorite'])->name('recipes.unfavorite');

Route::get('/register', [authController::class, 'showRegister'])->name('show.register');
Route::get('/login', [authController::class, 'showLogin'])->name('show.login');

Route::post('/register', [authController::class, 'register'])->name('register');
Route::post('/login', [authController::class, 'login'])->name('login');
Route::post('/logout', [authController::class, 'logout'])->name('logout');
Route::get('/recipes/{id}/pdf', [recipeController::class, 'downloadPdf'])->name('recipes.pdf');

<?php

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


Auth::routes();

Route::get('/', [App\Http\Controllers\User\WebController::class, 'index'])->name('home');
Route::get("/about", [App\Http\Controllers\User\WebController::class, 'about'])->name('about');
Route::get("/contact", [App\Http\Controllers\User\WebController::class, 'contact'])->name('contact');
Route::get("/cookingrecipes", [App\Http\Controllers\User\WebController::class, 'cookingRecipes'])->name('cookingrecipes');
Route::get("/cookingrecipes/{id}", [App\Http\Controllers\User\WebController::class, 'detail'])->name('detail');

Route::prefix('admin')->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin-home');
    Route::resource("recipe",App\Http\Controllers\Admin\RecipeController::class);

});

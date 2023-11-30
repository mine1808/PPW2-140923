<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Middleware\Admin;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    
    Route::get('/buku/list', [BukuController::class, 'list'])->name('buku.list');
    Route::get('/buku/list/search', [BukuController::class, 'listSearch'])->name('buku.listSearch');

    Route::get('/buku/detail/{id}', [BukuController::class, 'galBuku'])->name('buku.galeri');
    Route::post('/buku/detail/{id}/rate', [RatingController::class, 'ratingBuku'])->name('buku.rating');

    Route::get('/buku/favorite', [BukuController::class, 'showFavoriteBuku'])->name('buku.showFavorite');
    Route::post('/buku/favorite/{id}', [FavoriteController::class, 'favoriteBuku'])->name('buku.favorite');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware('admin')->group(function () {

        Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');
        Route::get('/buku/create', [BukuController::class, 'create'])->name('buku.create');
        
        Route::get('/buku/search', [BukuController::class, 'search'])->name('buku.search');
        Route::get('/buku/edit/{id}', [BukuController::class, 'edit'])->name('buku.edit');
        Route::post('/buku', [BukuController::class, 'store'])->name('buku.store');
        Route::post('/buku/update/{id}', [BukuController::class, 'update'])->name('buku.update');
        Route::post('/buku/delete/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');
        Route::post('/buku/edit/{id}/delete-image/{image_id}', [BukuController::class, 'destroyImage'])->name('buku.destroyImage');
        
    });
});

require __DIR__.'/auth.php';
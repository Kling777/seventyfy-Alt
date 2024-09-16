<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ArtistsController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\GenresController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SongsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resources([
    'genre' => GenresController::class,
    'country' => CountryController::class,
    'artist' => ArtistsController::class,
    'album' => AlbumController::class,
    'song' => SongsController::class,
]);
    
Route::get('/getAlbum/{id}', [SongsController::class, 'getAlbums']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

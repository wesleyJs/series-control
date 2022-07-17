<?php

use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\SeasonController;
use App\Http\Controllers\SeriesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

Route::resource('/series', SeriesController::class)
    ->except(['show'])->middleware(['auth']);

Route::get('/series/{series}/seasons', [SeasonController::class, 'index'])
    ->middleware(['auth'])->name('seasons.index');

Route::get('/seasons/{season}/episodes', [EpisodeController::class, 'index'])
    ->middleware(['auth'])->name('episodes.index');

Route::post('/seasons/{season}/episodes', [EpisodeController::class, 'update'])
    ->middleware(['auth'])->name('episodes.update');

Route::get('/mail', function () {
    return new \App\Mail\SeriesCreated(
        'Serie de teste',
        1,
        5,
        13,
    );
});

require __DIR__.'/auth.php';

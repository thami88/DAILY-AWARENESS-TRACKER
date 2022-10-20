<?php

use App\Http\Controllers\JournalController;
use App\Http\Controllers\ScoreController;
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
    return view('welcome');
});

Route::get('/dashboard', [JournalController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/create', [JournalController::class, 'create'])->middleware(['auth', 'verified'])->name('create');
Route::post('/store', [JournalController::class, 'store'])->middleware(['auth', 'verified'])->name('store');
Route::get('/edit/{journal}', [JournalController::class, 'edit'])->middleware(['auth', 'verified'])->name('edit');
Route::patch('/update/{journal}', [JournalController::class, 'update'])->middleware(['auth', 'verified'])->name('update');
Route::delete('/delete/{journal}', [JournalController::class, 'delete'])->middleware(['auth', 'verified'])->name('delete');

// Quality Score
Route::get('/score', [ScoreController::class, 'index'])->middleware(['auth', 'verified'])->name('score');
Route::get('/create/score', [ScoreController::class, 'create'])->middleware(['auth', 'verified'])->name('new');
Route::post('/score/store', [ScoreController::class, 'store'])->middleware(['auth', 'verified'])->name('store');
Route::get('/score/edit/{score}', [ScoreController::class, 'edit'])->middleware(['auth', 'verified'])->name('edit');
Route::patch('/score/update/{score}', [ScoreController::class, 'update'])->middleware(['auth', 'verified'])->name('update');
Route::delete('/score/delete/{score}', [ScoreController::class, 'delete'])->middleware(['auth', 'verified'])->name('delete');

require __DIR__ . '/auth.php';

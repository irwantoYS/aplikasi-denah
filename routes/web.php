<?php

use App\Http\Controllers\FreezerController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SpesimenController;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;

// Menampilkan Halaman Formulir
Route::get('/spesimen', [SpesimenController::class, 'index'])->name('spesimen.index');
Route::get('/spesimen/create', [SpesimenController::class, 'create'])->name('spesimen.create');
Route::post('/spesimen-store', [SpesimenController::class, 'store'])->name('spesimen.store');
Route::delete('/spesimen/{id}', [SpesimenController::class, 'destroy'])->name('spesimen.destroy');
Route::get('/spesimen/{spesimen}', [SpesimenController::class, 'show'])->name('spesimen.show');
Route::get('/spesimen/{id}/edit', [SpesimenController::class, 'edit'])->name('spesimen.edit');

Route::put('/spesimen/{id}', [SpesimenController::class, 'update'])->name('spesimen.update');
Route::resource('spesimen', SpesimenController::class);

$currentTime = Carbon::now();

Route::controller(HistoryController::class)->as('histories.')->group(function(){
    Route::get('/', 'index')->name('index');
    Route::post('/', 'store')->name('store');
    Route::get('/pendataan', 'getData')->name('getData');
    
});
Route::get('/admin/history', [AdminController::class, 'index'])->name('cari');

Route::controller(FreezerController::class)->as('freezers.')->group(function(){
    Route::get('freezer', 'index')->middleware(['auth'])->name('index');
    Route::post('freezer', 'update')->middleware(['auth'])->name('update');
    Route::get('data-freezer/{code}', 'getData')->name('getData');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');

    Route::get('users', [UserController::class, 'index'])->name('users.index');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
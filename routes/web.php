<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::get('/dashboard', [IndexController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::post('/add', [IndexController::class, 'store'])->name('store');
Route::get('/edit/{id}', [IndexController::class, 'edit'])->name('edit');
Route::put('/update/{id}', [IndexController::class, 'update'])->name('update');
Route::post('/delete', [IndexController::class, 'delete'])->name('delete');

Route::post('/data-table/import', [IndexController::class, 'import'])->name('import');
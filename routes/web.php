<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProfileController;
use App\Models\DataTable;
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

// table steel
Route::get('/create', [IndexController::class, 'create'])->name('dashboard.create');
Route::post('/add', [IndexController::class, 'store'])->name('store');
Route::get('/edit/{id}', [IndexController::class, 'edit'])->name('dashboard.edit');
Route::put('/update/{id}', [IndexController::class, 'update'])->name('update');
Route::delete('/delete/{id}', [IndexController::class, 'destroy'])->name('delete');

// import export
Route::post('/data-table/import', [IndexController::class, 'import'])->name('import');
Route::get('/data-table/export', [IndexController::class, 'export'])->name('export');

Route::get('/test', function() {
	return view('test', [
		'datas' => DataTable::all()
	]);
});

Route::get('/input-chart', [CartController::class, 'index'])->name('input-chart');
Route::post('/chart', [CartController::class, 'show'])->name('chart');
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
Route::get('/create', [IndexController::class, 'create'])->name('create');
Route::post('/add', [IndexController::class, 'store'])->name('store');
Route::get('/edit/{id}', [IndexController::class, 'edit'])->name('edit');
Route::put('/update/{id}', [IndexController::class, 'update'])->name('update');
Route::post('/delete', [IndexController::class, 'delete'])->name('delete');

// import export
Route::post('/data-table/import', [IndexController::class, 'import'])->name('import');
Route::get('/data-table/export', [IndexController::class, 'export'])->name('export');

Route::get('/test', function() {
	return view('test', [
		'datas' => DataTable::all()
	]);
});

Route::get('/input-cart', [CartController::class, 'index'])->name('input-cart');
Route::post('/cart', [CartController::class, 'show'])->name('cart');
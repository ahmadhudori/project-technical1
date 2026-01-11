<?php

use App\Http\Controllers\Chart\BlackSidewallController;
use App\Http\Controllers\Chart\WhiteSidewallController;
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
Route::group(['prefix' => 'bead-steel'], function () {
	Route::get('create', [IndexController::class, 'create'])->name('dashboard.create');
	Route::post('/add', [IndexController::class, 'store'])->name('store');
	Route::get('/edit/{id}', [IndexController::class, 'edit'])->name('dashboard.edit');
	Route::put('/update/{id}', [IndexController::class, 'update'])->name('update');
	Route::delete('/delete/{id}', [IndexController::class, 'destroy'])->name('delete');

	// import export
	Route::post('/import', [IndexController::class, 'import'])->name('import');
	Route::get('/export', [IndexController::class, 'export'])->name('export');
});


Route::get('/test', function() {
	return view('test', [
		'datas' => DataTable::all()
	]);
});

require __DIR__.'/sidewall.php';
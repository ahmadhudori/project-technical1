<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Chart\BlackSidewallController;
use App\Http\Controllers\Chart\WhiteSidewallController;

Route::group(['prefix' => 'chart'], function () {
	// black sidewall 2 compd
	Route::get('/input-black-sidewall-2-compd', [BlackSidewallController::class, 'inputChartBlackSidewall2Compd'])->name('chart.input-black-sidewall-2-compd');
	Route::post('/chart-black-sidewall-2-compd', [BlackSidewallController::class, 'showChartBlackSidewall2Compd'])->name('chart.chart-black-sidewall-2-compd');
	// black sidewall 3 compd
	Route::get('/input-black-sidewall-3-compd', [BlackSidewallController::class, 'inputChartBlackSidewall3Compd'])->name('chart.input-black-sidewall-3-compd');
	Route::post('/chart-black-sidewall-3-compd', [BlackSidewallController::class, 'showChartBlackSidewall3Compd'])->name('chart.chart-black-sidewall-3-compd');
	// black sidewall 4 compd
	Route::get('/input-black-sidewall-4-compd', [BlackSidewallController::class, 'inputChartBlackSidewall4Compd'])->name('chart.input-black-sidewall-4-compd');
	Route::post('/chart-black-sidewall-4-compd', [BlackSidewallController::class, 'showChartBlackSidewall4Compd'])->name('chart.chart-black-sidewall-4-compd');

	// white sidewall 2 compd
	Route::get('/input-white-sidewall-2-compd', [WhiteSidewallController::class, 'inputChartWhiteSidewall2Compd'])->name('chart.input-white-sidewall-2-compd');
	Route::post('/chart-white-sidewall-2-compd', [WhiteSidewallController::class, 'showChartWhiteSidewall2Compd'])->name('chart.chart-white-sidewall-2-compd');
	// white sidewall 3 compd
	Route::get('/input-white-sidewall-3-compd', [WhiteSidewallController::class, 'inputChartWhiteSidewall3Compd'])->name('chart.input-white-sidewall-3-compd');
	Route::post('/chart-white-sidewall-3-compd', [WhiteSidewallController::class, 'showChartWhiteSidewall3Compd'])->name('chart.chart-white-sidewall-3-compd');
	// white sidewall 4 compd
	Route::get('/input-white-sidewall-4-compd', [WhiteSidewallController::class, 'inputChartWhiteSidewall4Compd'])->name('chart.input-white-sidewall-4-compd');
	Route::post('/chart-white-sidewall-4-compd', [WhiteSidewallController::class, 'showChartWhiteSidewall4Compd'])->name('chart.chart-white-sidewall-4-compd');
});
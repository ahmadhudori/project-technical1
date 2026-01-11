<?php

namespace App\Http\Controllers\Chart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WhiteSidewallController extends Controller
{
    public function inputChartWhiteSidewall2Compd()
	{
		return view('chart.sidewall.white.2-compd.indexChart');
	}

	public function showChartWhiteSidewall2Compd(Request $request)
	{
			$w = [];
			$g = [];

			for ($i = 1; $i <= 20; $i++) {
				$valueW = $request->input('w'.$i);
				$valueG = $request->input('g'.$i);
				if ($valueW !== null) {
					$w[$i] = (float) $valueW; 
				}
				
				if ($valueG !== null) {
					$g[$i] = (float) $valueG;
				}
			}

			// Variable wp
			$wp = [];
			$wp[1] = $w[1];

			for ($i = 2; $i <= count($w); $i++) {
				$wp[$i] = $wp[$i - 1] + $w[$i];
			}
			// $widthTotal
			$widthTotal = [];

			$widthTotal[] = ['x' => 0,  'y' => $g[1]];

			for ($i = 2; $i <= count($wp); $i++) {
					$widthTotal[] = ['x' => $wp[$i], 'y' => $g[$i]];
				}

			//	RC
			$rc = [
				['x' => 157, 'y' => 0],
				['x' => 182, 'y' => 5.7],
				['x' => 199, 'y' => 3.5],
				['x' => 207, 'y' => 0.5],
			];

			// GA (titik hijau lurus di atas)
			for ($i = 2; $i <= count($w); $i++) {
				$ga[] = ['x' => $wp[$i], 'y' => 13];
				$ga[] = ['x' => $wp[$i], 'y' => 15];
				$ga[] = ['x' => null, 'y' => null];
			}

			// variable titik tengah GA
			// $cw1 = $wp[2] / 2;
			// $cw2 = $wp[2] + ($w[3] / 2);
			// $cw3 = $wp[3] + ($w[4] / 2);
			// $cw4 = $wp[4] + ($w[5] / 2);
			// $cw5 = $wp[5] + ($w[6] / 2);
			// $cw6 = $wp[6] + ($w[7] / 2);

			$cw = [];
			$cw[1] = $wp[2] / 2;
			for ($i = 2; $i < count($w); $i++) {
				$cw[$i] = $wp[$i] + ($w[$i + 1] / 2);
			}

			// $gaLabels = [
			// 	[
			// 		'x' => $cw[1],
			// 		'y' => 14,
			// 		'text' => $w[2]
			// 	],
			// 	[
			// 		'x' => $cw[2],
			// 		'y' => 14,
			// 		'text' => $w[3]
			// 	],
			// ];
			$gaLabels = [];
			for ($i = 1; $i <= count($cw); $i++) {
				$gaLabels[] = [
					'x' => $cw[$i],
					'y' => 14,
					'text' => $w[$i + 1]
				];
			}

			$wpTerakhirValue = $wp[count($wp)] + 5;
			// dd($wpTerakhirValue);

			// white sidewall
			$widthTotalWhite = [
				['x' => 0, 'y' => 0.5],
				['x' => 20, 'y' => 6.1],
				['x' => 35, 'y' => 8.2],
				['x' => 60, 'y' => 8.2],
				['x' => 77, 'y' => 5.8],
				['x' => 88, 'y' => 5.6],
				['x' => 103, 'y' => 5.8],
				['x' => 118, 'y' => 5.6],
				['x' => 129, 'y' => 5.8],
				['x' => 149, 'y' => 5.8],
				['x' => 174, 'y' => 6.8],
				['x' => 182, 'y' => 5.7],
				['x' => 199, 'y' => 3.5],
				['x' => 207, 'y' => 0.5],
			];

			$rcWhite = [
				['x' => 157, 'y' => 0],
				['x' => 182, 'y' => 5.7],
				['x' => 199, 'y' => 3.5],
				['x' => 207, 'y' => 0.5],
			];

			$gaWhite = [
				['x' => 20, 'y' => 13],
				['x' => 20, 'y' => 15],
				['x' => null, 'y' => null],
				['x' => 35, 'y' => 13],
				['x' => 35, 'y' => 15],
				['x' => null, 'y' => null],
				['x' => 60, 'y' => 13],
				['x' => 60, 'y' => 15],
				['x' => null, 'y' => null],
				['x' => 77, 'y' => 13],
				['x' => 77, 'y' => 15],
				['x' => null, 'y' => null],
				['x' => 88, 'y' => 13],
				['x' => 88, 'y' => 15],
				['x' => null, 'y' => null],
				['x' => 103, 'y' => 13],
				['x' => 103, 'y' => 15],
				['x' => null, 'y' => null],
				['x' => 118, 'y' => 13],
				['x' => 118, 'y' => 15],
				['x' => null, 'y' => null],
				['x' => 129, 'y' => 13],
				['x' => 129, 'y' => 15],
				['x' => null, 'y' => null],
				['x' => 149, 'y' => 13],
				['x' => 149, 'y' => 15],
				['x' => null, 'y' => null],
				['x' => 174, 'y' => 13],
				['x' => 174, 'y' => 15],
				['x' => null, 'y' => null],
				['x' => 182, 'y' => 13],
				['x' => 182, 'y' => 15],
				['x' => null, 'y' => null],
				['x' => 199, 'y' => 13],
				['x' => 199, 'y' => 15],
				['x' => null, 'y' => null],
				['x' => 207, 'y' => 13],
				['x' => 207, 'y' => 15],
				['x' => null, 'y' => null],
			];

			$gaLabelsWhite = [
				['x' => 10, 'y' => 14, 'text' => '20'],
				['x' => 27.5, 'y' => 14, 'text' => '15'],
				['x' => 47.5, 'y' => 14, 'text' => '25'],
				['x' => 68.5, 'y' => 14, 'text' => '17'],
				['x' => 82.5, 'y' => 14, 'text' => '11'],
				['x' => 95.5, 'y' => 14, 'text' => '15'],
				['x' => 110.5, 'y' => 14, 'text' => '15'],
				['x' => 123.5, 'y' => 14, 'text' => '11'],
				['x' => 139, 'y' => 14, 'text' => '20'],
				['x' => 161.5, 'y' => 14, 'text' => '25'],
				['x' => 178, 'y' => 14, 'text' => '8'],
				['x' => 190.5, 'y' => 14, 'text' => '17'],
				['x' => 203, 'y' => 14, 'text' => '8'],
			];

			$newDataWhite = [
				['x' => 0, 'y' => 0.5],
				['x' => 20, 'y' => 6.1],
				['x' => 35, 'y' => 8.2],
				['x' => 60, 'y' => 8.2],
				['x' => 77, 'y' => 5.8],
				['x' => 88, 'y' => 0.6],
				['x' => 103, 'y' => 0.6],
				['x' => 118, 'y' => 0.6],
				['x' => 129, 'y' => 5.8],
				['x' => 149, 'y' => 5.8],
				['x' => 174, 'y' => 6.8],
				['x' => 182, 'y' => 5.7],
				['x' => 199, 'y' => 3.5],
				['x' => 207, 'y' => 0.5],
			];

			return view('chart.sidewall.white.2-compd.chart', compact(
				'widthTotal',
				'rc',
				'ga',
				'gaLabels',
				'wpTerakhirValue',
				'widthTotalWhite',
				'rcWhite',
				'gaWhite',
				'gaLabelsWhite',
				'newDataWhite'
			));
		
	}
	public function inputChartWhiteSidewall3Compd()
	{
		return view('chart.sidewall.white.3-compd.indexChart');
	}

	public function inputChartWhiteSidewall4Compd()
	{
		return view('chart.sidewall.white.4-compd.indexChart');
	}
}

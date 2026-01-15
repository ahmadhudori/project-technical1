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
			// Left Start
			// grafik width total start
			$lw = [];
			$lg = [];

			for ($i = 1; $i <= 20; $i++) {
				$valueLW = $request->input('lw'.$i);
				$valueLG = $request->input('lg'.$i);
				if ($valueLW !== null) {
					$lw[$i] = (float) $valueLW; 
				}
				
				if ($valueLG !== null) {
					$lg[$i] = (float) $valueLG;
				}
			}

			// Variable wp
			$lwp = [];
			$lwp[1] = $lw[1];

			for ($i = 2; $i <= count($lw); $i++) {
				$lwp[$i] = $lwp[$i - 1] + $lw[$i];
			}
			// $widthTotal
			$widthTotal = [];

			$widthTotal[] = ['x' => 0,  'y' => $lg[1]];

			for ($i = 2; $i <= count($lwp); $i++) {
					$widthTotal[] = ['x' => $lwp[$i], 'y' => $lg[$i]];
				}
			// grafik width total end

			//	grafik RC start
			$rc = [
				['x' => 157, 'y' => 0],
				['x' => 182, 'y' => 5.7],
				['x' => 199, 'y' => 3.5],
				['x' => 207, 'y' => 0.5],
			];
			// grafik RC end

			// GA (titik hijau lurus di atas)
			for ($i = 2; $i <= count($lw); $i++) {
				$lga[] = ['x' => $lwp[$i], 'y' => 13];
				$lga[] = ['x' => $lwp[$i], 'y' => 15];
				$lga[] = ['x' => null, 'y' => null];
			}

			// variable titik tengah GA
			// $cw1 = $wp[2] / 2;
			// $cw2 = $wp[2] + ($w[3] / 2);
			// $cw3 = $wp[3] + ($w[4] / 2);
			// $cw4 = $wp[4] + ($w[5] / 2);
			// $cw5 = $wp[5] + ($w[6] / 2);
			// $cw6 = $wp[6] + ($w[7] / 2);

			// titik tengah tiap ga untuk menaruh label w
			$cw = [];
			$cw[1] = $lwp[2] / 2;
			for ($i = 2; $i < count($lw); $i++) {
				$cw[$i] = $lwp[$i] + ($lw[$i + 1] / 2);
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
					'text' => $lw[$i + 1]
				];
			}

			$lwpTerakhirValue = $lwp[count($lwp)] + 5;
			// Left end

			// Right Start
			$rw = [];
			$rg = [];
			for ($i = 1; $i <=20; $i++) {
				$valueRW = $request->input('rw'. $i);
				$valueRG = $request->input('rg' . $i);
				if ($valueRW !== null) {
					$rw[$i] = (float) $valueRW;
				}
				if ($valueRG !== null) {
					$rg[$i] = (float) $valueRG;
				}
			}
			
			$rwp = [];
			$rwp[1] = $rw[1];
			for ($i = 2; $i <= count($rw); $i++) {
				$rwp[$i] = $rwp[$i - 1] + $rw[$i];
			}

			$widthTotalWhite = [];
			$widthTotalWhite[] = ['x' => 0, 'y' => $rg[1]];
			for ($i = 2; $i <= count($rwp); $i++) {
				$widthTotalWhite[] = ['x' => $rwp[$i], 'y' => $rg[$i]];
			}

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

			// grafik new data white start
			$ww = [];
			$wg = [];
			for ($i = 1; $i <= 20; $i++) {
				$valueWW = $request->input('ww'. $i);
				$valueWG = $request->input('wg'. $i);
				if ($valueWW !== null) {
					$ww[$i] = (float) $valueWW;
				}
				if ($valueWG !== null) {
					$wg[$i] = (float) $valueWG;
				}
			}

			$wwp = [];
			$wwp[1] = $ww[1];
			for ($i = 2; $i <= count($ww); $i++) {
				$wwp[$i] = $wwp[$i - 1] + $ww[$i];
			}


			$newDataWhite = [];
			$newDataWhite[] = ['x' => 0, 'y' => $wg[1]];
			for ($i = 2; $i <= count($ww); $i++) {
				$newDataWhite[] = ['x' => $wwp[$i], 'y' => $wg[$i]];
			}
			// grafik new data white end

			$gravity = [
				['x' => 67, 'y' => 7.2],
				['x' => 67, 'y' => 7.7],
				['x' => 77, 'y' => 6.3],
				['x' => 88, 'y' => 6.1],
				['x' => 103, 'y' => 6.3],
				['x' => 118, 'y' => 6.1],
				['x' => 129, 'y' => 6.3],
				['x' => 139, 'y' => 6.3],
				['x' => 139, 'y' => 5.8],
			];

			$rwpTerakhirValue = $rwp[count($rwp)] + 5;
			// Right End

			return view('chart.sidewall.white.2-compd.chart', compact(
				'widthTotal',
				'rc',
				'lga',
				'gaLabels',
				'lwpTerakhirValue',
				'widthTotalWhite',
				'rcWhite',
				'gaWhite',
				'gaLabelsWhite',
				'newDataWhite',
				'gravity',
				'rwpTerakhirValue'
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

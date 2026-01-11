<?php

namespace App\Http\Controllers\Chart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BlackSidewallController extends Controller
{
    public function inputChartBlackSidewall2Compd()
	{
		return view('chart.sidewall.black.2-compd.indexChart');
	}
	public function showChartBlackSidewall2Compd(Request $request)
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
				['x' => 86.5, 'y' => 0],
				['x' => 104, 'y' => 4],
				['x' => 124, 'y' => 2.8],
				['x' => 142, 'y' => 1.7],
				['x' => 147, 'y' => 0.5],
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

			return view('chart.sidewall.black.2-compd.chart', compact(
				'widthTotal',
				'rc',
				'ga',
				'gaLabels'
			));
		
	}
	public function inputChartBlackSidewall3Compd()
	{
		return view('chart.sidewall.black.3-compd.indexChart');
	}

	public function showChartBlackSidewall3Compd(Request $request)
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

		for ($i = 2; $i <= count($w); $i++) {
				$widthTotal[] = ['x' => $wp[$i], 'y' => $g[$i]];
			}

		// AREA BEC (belum)
		// $areaBEC1 = (($g[1] + $g[2]) * $w[2]) / 2;
		// $areaBEC2 = (($g[2] + $g[3]) * $w[3]) / 2;
		// $areaBEC3 = (($g[3] + $g[4]) * $w[4]) / 2;
		// $totBEC = $areaBEC1 + $areaBEC2 + $areaBEC3;
		
		// TOTAL AREA
		$tot = [];
		$tot_area = 0;
		for ($i = 1; $i < count($w); $i++) {
			$tot[$i] = (($g[$i] + $g[$i + 1]) * $w[$i + 1]) / 2;
			$tot_area += $tot[$i];
		}

		$tot_area = $tot_area / 100;
		$tot_area = number_format($tot_area, 3, '.');


		// BE
		$gbe1 = $request->gbe1 ?? 0;
		$gbe2 = $request->gbe2 ?? 0;
		$gbe3 = $request->gbe3 ?? 0;
		$gbe4 = $request->gbe4 ?? 0;
		$gbe5 = $request->gbe5 ?? 0;
		$gbe6 = $request->gbe6 ?? 0;
		
		$xwp4 = $gbe4 == 0 ? $wp[3] - $w[3] : $wp[4];
		$xwp5 = $gbe5 == 0 ? $wp[4] - $w[4] : $wp[5];
		$xwp6 = $gbe6 == 0 ? $wp[5] - $w[5] : $wp[6];
		if ($gbe4 == 0) {
			$xwp5 = null;
			$gbe5 = null;
			$xwp6 = null;
			$gbe6 = null;
		} elseif ($gbe5 == 0) {
			$xwp6 = null;
			$gbe6 = null;
		}
		$bec = [
			['x' => $wp[1] == 0 ? null : $wp[1], 'y' => $gbe1 == 0 ? null : $gbe1],
			['x' => $wp[2] == 0 ? null : $wp[2], 'y' => $gbe2 == 0 ? null : $gbe2],
			['x' => $wp[3] == 0 ? null : $wp[3], 'y' => $gbe3 == 0 ? null : $gbe3],
			['x' => $xwp4, 'y' => $gbe4],
			['x' => $xwp5, 'y' => $gbe5],
			['x' => $xwp6, 'y' => $gbe6],
		];


		// Width RC
		// $wrc1 = [];
		// $wrc1g = [];
		// for ($i = 1; $i <= 20; $i++) {
		// 	$wrc1Value = $request->input('wrc1_'.$i);
		// 	$garc1Value = $request->input('garc1_'.$i);
			
		// 	if ($wrc1Value !== null) {
		// 		$wrc1[$i] = (float) $wrc1Value;
		// 	}
		// 	if ($garc1Value !== null) {
		// 		$wrc1g[$i] = (float) $garc1Value;
		// 	}
		// }

		// $wrc1p = [];
		// if (isset($wrc1[1])) {
		// 	$wrc1p[1] = $wrc1[1];
	
		// 	for ($i = 2; $i <= count($wrc1); $i++) {
		// 		$wrc1p[$i] = $wrc1p[$i - 1] + $wrc1[$i];
		// 	}
		// }

		// $wrc1Data = [];
		// for ($i = 1; $i <= count($wrc1p); $i++) {
		// 	$wrc1Data[] = ['x' => $wrc1p[$i], 'y' => $wrc1g[$i]];
		// }

		$rc = [
			['x' => 50, 'y' => 0],
			['x' => 67, 'y' => 6.4],
			['x' => 87, 'y' => 2.2],
			['x' => 92, 'y' => 0.5],
		];

		// GA (titik hijau lurus di atas)
		// $ga = [
		// 	['x' => $wp[2],   'y' => 13],
		// 	['x' => $wp[2],   'y' => 15],
		// 	['x' => null, 'y' => null],
		// 	['x' => $wp[3],   'y' => 13],
		// 	['x' => $wp[3],   'y' => 15],
		// 	['x' => null, 'y' => null],
		// ];

		$ga = [];
		for ($i = 2; $i <= count($w); $i++) {
			$ga[] = ['x' => $wp[$i], 'y' => 13];
			$ga[] = ['x' => $wp[$i], 'y' => 15];
			$ga[] = ['x' => null, 'y' => null];
		}

		// GA Label
		$cw = [];
		$cw[1] = $wp[2] / 2;
		for($i = 2; $i < count($w); $i++) {
			$cw[$i] = $wp[$i] + ($w[$i + 1] / 2);
		}

		$gaLabels = [];
		for ($i = 1; $i < count($w); $i++) {
			if(!isset($cw[$i], $w[$i + 1])) continue;
			$gaLabels[] = [
				'x' => $cw[$i],
				'y' => 14,
				'text' => $w[$i + 1]
			];
		}

		return view('chart.sidewall.black.3-compd.chart', compact(
			'widthTotal',
			'bec',
			'rc',
			'ga',
			'tot_area',
			// 'totBEC',
			'gaLabels'
		));
	}
	
	public function inputChartBlackSidewall4Compd()
	{
		return view('chart.sidewall.black.4-compd.indexChart');
	}
    public function showChartBlackSidewall4Compd(Request $request)
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


		// AREA BEC (belum)
		// $areaBEC1 = (($g[1] + $g[2]) * $w[2]) / 2;
		// $areaBEC2 = (($g[2] + $g[3]) * $w[3]) / 2;
		// $areaBEC3 = (($g[3] + $g[4]) * $w[4]) / 2;
		// $totBEC = $areaBEC1 + $areaBEC2 + $areaBEC3;
		
		// TOTAL AREA
		$tot = [];
		$tot_area = 0;
		for ($i = 1; $i < count($w); $i++) {
			$tot[$i] = (($g[$i] + $g[$i + 1]) * $w[$i + 1]) / 2;
			$tot_area += $tot[$i];
		}

		$tot_area = $tot_area / 100;
		$tot_area = number_format($tot_area, 3, '.');

		// $widthTotal
		$widthTotal = [];

		$widthTotal[] = ['x' => 0,  'y' => $g[1]];

		for ($i = 2; $i <= count($w); $i++) {
				$widthTotal[] = ['x' => $wp[$i], 'y' => $g[$i]];
			}
		
		// BEC
		$gbec1 = $request->gbec1 ? $request->gbec1 : 0;
		$gbec2 = $request->gbec2 ? $request->gbec2 : 0;
		$gbec3 = $request->gbec3 ? $request->gbec3 : 0;
		$gbec4 = $request->gbec4 ? $request->gbec4 : 0;
		$gbec5 = $request->gbec5 ? $request->gbec5 : 0;
		$gbec6 = $request->gbec6 ? $request->gbec6 : 0;
		
		$xwp4 = $gbec4 == 0 ? $wp[3] - $w[3] : $wp[4];
		$xwp5 = $gbec5 == 0 ? $wp[4] - $w[4] : $wp[5];
		$xwp6 = $gbec6 == 0 ? $wp[5] - $w[5] : $wp[6];
		if ($gbec4 == 0) {
			$xwp5 = null;
			$gbec5 = null;
			$xwp6 = null;
			$gbec6 = null;
		} elseif ($gbec5 == 0) {
			$xwp6 = null;
			$gbec6 = null;
		}
		$bec = [
			['x' => $wp[1] == 0 ? null : $wp[1], 'y' => $gbec1],
			['x' => $wp[2] == 0 ? null : $wp[2], 'y' => $gbec2],
			['x' => $wp[3] == 0 ? null : $wp[3], 'y' => $gbec3],
			['x' => $xwp4, 'y' => $gbec4],
			['x' => $xwp5, 'y' => $gbec5],
			['x' => $xwp6, 'y' => $gbec6],
		];

		// RC (belum)
		$rc = [
			// ['x' => 70, 'y' => 1.5],
			// ['x' => 80, 'y' => 2],
			// ['x' => 90, 'y' => 3],
			// ['x' => 100, 'y' => 1],
		];

		// Width RC1
		$wrc1 = [];
		$wrc1g = [];
		for ($i = 1; $i <= 20; $i++) {
			$wrc1Value = $request->input('wrc1_'.$i);
			$garc1Value = $request->input('garc1_'.$i);
			
			if ($wrc1Value !== null) {
				$wrc1[$i] = (float) $wrc1Value;
			}
			if ($garc1Value !== null) {
				$wrc1g[$i] = (float) $garc1Value;
			}
		}

		$wrc1p = [];
		$wrc1p[1] = $wrc1[1];

		for ($i = 2; $i <= count($wrc1); $i++) {
			$wrc1p[$i] = $wrc1p[$i - 1] + $wrc1[$i];
		}

		$wrc1Data = [];
		for ($i = 1; $i <= count($wrc1p); $i++) {
			$wrc1Data[] = ['x' => $wrc1p[$i], 'y' => $wrc1g[$i]];
		}

		// GA (titik hijau lurus di atas)
		// $ga = [
		// 	['x' => $wp[2],   'y' => 13],
		// 	['x' => $wp[2],   'y' => 15],
		// 	['x' => null, 'y' => null],
		// 	['x' => $wp[3],   'y' => 13],
		// 	['x' => $wp[3],   'y' => 15],
		// 	['x' => null, 'y' => null],
		// ];

		$ga = [];
		for ($i = 2; $i <= count($w); $i++) {
			$ga[] = ['x' => $wp[$i], 'y' => 13];
			$ga[] = ['x' => $wp[$i], 'y' => 15];
			$ga[] = ['x' => null, 'y' => null];
		}

		// GA Label
		$cw = [];
		$cw[1] = $wp[2] / 2;
		for($i = 2; $i < count($w); $i++) {
			$cw[$i] = $wp[$i] + ($w[$i + 1] / 2);
		}

		$gaLabels = [];
		for ($i = 1; $i < count($w); $i++) {
			if(!isset($cw[$i], $w[$i + 1])) continue;
			$gaLabels[] = [
				'x' => $cw[$i],
				'y' => 14,
				'text' => $w[$i + 1]
			];
		}

		return view('chart.sidewall.black.4-compd.chart', compact(
			'widthTotal',
			'bec',
			'rc',
			'wrc1Data',
			'ga',
			'tot_area',
			// 'totBEC',
			'gaLabels'
		));
	}
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class CartController extends Controller
{
	public function inputChart4Compd()
	{
		return view('chart.sidewall.4-compd.indexChart');

	}
    public function show(Request $request)
	{
		try {
			// variable w
			// $w1 = $request->w1;
			// $w2 = $request->w2;
			// sampai 20

			// Variable g
			// $g1 = $request->g1;
			// $g2 = $request->g2;
			// sampai 20

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
			// $wp1 = $w1;
			// $wp2 = $w1 + $w2;
			// $wp3 = $wp2 + $w3;
			// sampai $wp20 = $wp19 + $w20;

			$wp = [];
			$wp[1] = $w[1];

			for ($i = 2; $i <= count($w); $i++) {
				$wp[$i] = $wp[$i - 1] + $w[$i];
			}

			// Variable tot/total
			// $tot1 = (($g1 + $g2) * $w2) / 2;
			// $tot2 = (($g2 + $g3) * $w3) / 2;
			// $tot3 = (($g3 + $g4) * $w4) / 2;
			// sampai $tot19 = (($g19 + $g20) * $w20) / 2;


			// Variable total area
			// $tot_area = $tot1 + $tot2 + $tot3 + $tot4 + $tot5 + $tot6 + $tot7 + $tot8 + $tot9 + $tot10 + $tot11 + $tot12 + $tot13 + $tot14 + $tot15 + $tot16 + $tot17 + $tot18 + $tot19;

			// AREA BEC

			// area BEC1 = ((G1 + G2) * W2) / 2
			// area BEC2 = ((G2 + G3) * W3) / 2
			// area BEC3 = ((G3 + G4) * W4) / 2

			$areaBEC1 = (($g[1] + $g[2]) * $w[2]) / 2;
			$areaBEC2 = (($g[2] + $g[3]) * $w[3]) / 2;
			$areaBEC3 = (($g[3] + $g[4]) * $w[4]) / 2;
			$totBEC = $areaBEC1 + $areaBEC2 + $areaBEC3;
			// dd($areaBEC1, $areaBEC2, $areaBEC3, 'totBec: '.$totBEC);

			
			// TOTAL AREA
			$tot = [];
			$tot_area = 0;
			for ($i = 1; $i < count($w); $i++) {
				$tot[$i] = (($g[$i] + $g[$i + 1]) * $w[$i + 1]) / 2;
				$tot_area += $tot[$i];
			}

			$tot_area = $tot_area / 100;
			$tot_area = number_format($tot_area, 3, '.');

			// $labels = [0,5,10,15,20,25,30,35,40,45,50,55,60,65,70,75,80,85,90,95,100,105,110,115,120];

			// TOTAL (GARIS UTAMA)

			// $widthTotal = [
			// 	['x' => 0,  'y' => $g[1]],
			// 	['x' => $wp[2],  'y' => $g[2]],
			// 	['x' => $wp[3],  'y' => $g[3]],
			// 	sampai
			// 	['x' => $wp[20], 'y' => $g[20]],
			// ];

			
			$widthTotal = [];

			$widthTotal[] = ['x' => 0,  'y' => $g[1]];

			for ($i = 2; $i <= count($wp); $i++) {
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
			// dd($xwp5);
			$bec = [
				['x' => $wp[1], 'y' => $gbec1],
				['x' => $wp[2], 'y' => $gbec2],
				['x' => $wp[3], 'y' => $gbec3],
				['x' => $xwp4, 'y' => $gbec4],
				['x' => $xwp5, 'y' => $gbec5],
				['x' => $xwp6, 'y' => $gbec6],
			];
			// dd(($wp[3] - 7)); jika gbec 0, maka x - $wp[sebelumnya]. tebal 0.

			// RC (belum)
			$rc = [
				// ['x' => 70, 'y' => 1.5],
				// ['x' => 80, 'y' => 2],
				// ['x' => 90, 'y' => 3],
				// ['x' => 100, 'y' => 1],
			];

			// Width RC1
			// $wrc1 = [
			// 	['x' => 75, 'y' => 1.5],
			// 	['x' => 85, 'y' => 2.5],
			// ];

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
			
			// GA (titik hijau lurus di atas) (belum)
			$ga = [
				// ['x' => 10,   'y' => 13],
				// ['x' => 10,   'y' => 15],
			];

			return view('chart.sidewall.4-compd.chart', compact(
				// 'labels',
				'widthTotal',
				'bec',
				'rc',
				'wrc1Data',
				'ga',
				'tot_area',
				'totBEC',
			));
		} catch (\Throwable $th) {
			Alert::error('Error: Input tidak sesuai');
			return redirect()->back()->withInput();
		}
	}

}

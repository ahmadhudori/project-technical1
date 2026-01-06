<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
	public function index()
	{
		return view('chart.indexCart');

	}
    public function show(Request $request)
	{
		// variable w
		// $w1 = $request->w1;
		// $w2 = $request->w2;
		// $w3 = $request->w3;
		// $w4 = $request->w4;
		// $w5 = $request->w5;
		// $w6 = $request->w6;
		// $w7 = $request->w7;
		// $w8 = $request->w8;
		// $w9 = $request->w9;
		// $w10 = $request->w10;
		// $w11 = $request->w11;
		// $w12 = $request->w12;
		// $w13 = $request->w13;
		// $w14 = $request->w14;
		// $w15 = $request->w15;
		// $w16 = $request->w16;
		// $w17 = $request->w17;
		// $w18 = $request->w18;
		// $w19 = $request->w19;
		// $w20 = $request->w20;

		// Variable g
		// $g1 = $request->g1;
		// $g2 = $request->g2;
		// $g3 = $request->g3;
		// $g4 = $request->g4;
		// $g5 = $request->g5;
		// $g6 = $request->g6;
		// $g7 = $request->g7;
		// $g8 = $request->g8;
		// $g9 = $request->g9;
		// $g10 = $request->g10;
		// $g11 = $request->g11;
		// $g12 = $request->g12;
		// $g13 = $request->g13;
		// $g14 = $request->g14;
		// $g15 = $request->g15;
		// $g16 = $request->g16;
		// $g17 = $request->g17;
		// $g18 = $request->g18;
		// $g19 = $request->g19;
		// $g20 = $request->g20;

		$w = [];
		$g = [];

		for ($i = 1; $i <= 20; $i++) {
			$valueW = $request->input('w'.$i);
			$valueG = $request->input('g'.$i);
			if ($valueW !== null) {
				$w[$i] = (float) $valueW; //
			}
			if ($valueG !== null) {
				$g[$i] = (float) $valueG;
			}
		}


		// Variable wp
		// $wp1 = $w1;
		// $wp2 = $w1 + $w2;
		// $wp3 = $wp2 + $w3;
		// $wp4 = $wp3 + $w4;
		// $wp5 = $wp4 + $w5;
		// $wp6 = $wp5 + $w6;
		// $wp7 = $wp6 + $w7;
		// $wp8 = $wp7 + $w8;
		// $wp9 = $wp8 + $w9;
		// $wp10 = $wp9 + $w10;
		// $wp11 = $wp10 + $w11;
		// $wp12 = $wp11 + $w12;
		// $wp13 = $wp12 + $w13;
		// $wp14 = $wp13 + $w14;
		// $wp15 = $wp14 + $w15;
		// $wp16 = $wp15 + $w16;
		// $wp17 = $wp16 + $w17;
		// $wp18 = $wp17 + $w18;
		// $wp19 = $wp18 + $w19;
		// $wp20 = $wp19 + $w20;

		$wp = [];
		$wp[1] = $w[1];

		for ($i = 2; $i <= count($w); $i++) {
			$wp[$i] = $wp[$i - 1] + $w[$i];
		}

		// Variable tot/total
		// $tot1 = (($g1 + $g2) * $w2) / 2;
		// $tot2 = (($g2 + $g3) * $w3) / 2;
		// $tot3 = (($g3 + $g4) * $w4) / 2;
		// $tot4 = (($g4 + $g5) * $w5) / 2;
		// $tot5 = (($g5 + $g6) * $w6) / 2;
		// $tot6 = (($g6 + $g7) * $w7) / 2;
		// $tot7 = (($g7 + $g8) * $w8) / 2;
		// $tot8 = (($g8 + $g9) * $w9) / 2;
		// $tot9 = (($g9 + $g10) * $w10) / 2;
		// $tot10 = (($g10 + $g11) * $w11) / 2;
		// $tot11 = (($g11 + $g12) * $w12) / 2;
		// $tot12 = (($g12 + $g13) * $w13) / 2;
		// $tot13 = (($g13 + $g14) * $w14) / 2;
		// $tot14 = (($g14 + $g15) * $w15) / 2;
		// $tot15 = (($g15 + $g16) * $w16) / 2;
		// $tot16 = (($g16 + $g17) * $w17) / 2;
		// $tot17 = (($g17 + $g18) * $w18) / 2;
		// $tot18 = (($g18 + $g19) * $w19) / 2;
		// $tot19 = (($g19 + $g20) * $w20) / 2;


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
		// 	['x' => $wp[4],  'y' => $g[4]],
		// 	['x' => $wp[5],  'y' => $g[5]],
		// 	['x' => $wp[6], 'y' => $g[6]],
		// 	['x' => $wp[7], 'y' => $g[7]],
		// 	['x' => $wp[8], 'y' => $g[8]],
		// 	['x' => $wp[9], 'y' => $g[9]],
		// 	['x' => $wp[10], 'y' => $g[10]],
		// 	['x' => $wp[11], 'y' => $g[11]],
		// 	['x' => $wp[12], 'y' => $g[12]],
		// 	['x' => $wp[13], 'y' => $g[13]],
		// 	['x' => $wp[14], 'y' => $g[14]],
		// 	['x' => $wp[15], 'y' => $g[15]],
		// 	['x' => $wp[16], 'y' => $g[16]],
		// 	['x' => $wp[17], 'y' => $g[17]],
		// 	['x' => $wp[18], 'y' => $g[18]],
		// 	['x' => $wp[19], 'y' => $g[19]],
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

		return view('chart.cart', compact(
			// 'labels',
			'widthTotal',
			'bec',
			'rc',
			'wrc1Data',
			'ga',
			'tot_area',
			'totBEC',
		));
		}

}

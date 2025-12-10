<?php

namespace Database\Seeders;

use App\Models\DataTable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class dataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DataTable::create([
			'code_b1_b2_edgetape' => 'DRS160',
			'code_b2' => '',
			'width' => 160,
			'angel' => 2.4,
			'ga' => 1.2,
			'compd' => 'Z110',
			'treat_code' => 'YC1239',
			'belt_cord' => '2+2*0.25 HT',
			'direction' => 'LAY RIGHT',
			'posisi_edgetape' => 'ATAS',
			'edgetape_b1' => '(25 - 25) Q200 LIPAT',
			'turn' => 'NORMAL',
			'code_wraping' => 'DR160S',
			'width_after_wraping' => 200
		]);
        DataTable::create([
			'code_b1_b2_edgetape' => 'DRS161',
			'code_b2' => '',
			'width' => 200,
			'angel' => 2.4,
			'ga' => 1.2,
			'compd' => 'Z110',
			'treat_code' => 'YC1239',
			'belt_cord' => '2+2*0.25 HT',
			'direction' => 'LAY RIGHT',
			'posisi_edgetape' => 'ATAS',
			'edgetape_b1' => '(25 - 25) Q200 LIPAT',
			'turn' => 'NORMAL',
			'code_wraping' => 'DR161S',
			'width_after_wraping' => 202
		]);
        DataTable::create([
			'code_b1_b2_edgetape' => 'DRS162',
			'code_b2' => '',
			'width' => 202,
			'angel' => 2.4,
			'ga' => 1.2,
			'compd' => 'Z110',
			'treat_code' => 'YC1239',
			'belt_cord' => '2+2*0.25 HT',
			'direction' => 'LAY RIGHT',
			'posisi_edgetape' => 'ATAS',
			'edgetape_b1' => '(25 - 25) Q200 LIPAT',
			'turn' => 'NORMAL',
			'code_wraping' => 'DR162S',
			'width_after_wraping' => 204
		]);
    }
}

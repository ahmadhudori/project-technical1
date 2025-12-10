<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataTable extends Model
{
    protected $table = 'data_tables';

	protected $fillable = [
		'code_b1_b2_edgetape',
		'code_b2',
		'width',
		'angel',
		'ga',
		'compd',
		'treat_code',
		'belt_cord',
		'direction',
		'posisi_edgetape',
		'edgetape_b1',
		'turn',
		'code_wraping',
		'width_after_wraping',
	];
}

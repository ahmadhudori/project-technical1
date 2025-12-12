<?php

namespace App\Imports;

use App\Models\Datatable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DataTableImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Datatable([
            'code_b1_b2_edgetape' => $row['code_b1_b2_edgetape'],
            'code_b2'             => $row['code_b2'],
            'width'               => $row['width'],
            'angel'               => $row['angel'],
            'ga'                  => $row['ga'],
            'compd'               => $row['compd'],
            'treat_code'          => $row['treat_code'],
            'belt_cord'           => $row['belt_cord'],
            'direction'           => $row['direction'],
            'posisi_edgetape'     => $row['posisi_edgetape'],
            'edgetape_b1'         => $row['edgetape_b1'],
            'turn'                => $row['turn'],
            'code_wraping'        => $row['code_wraping'],
            'width_after_wraping' => $row['width_after_wraping'],
        ]);
    }
}

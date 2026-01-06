<?php

namespace App\Exports;

use App\Models\DataTable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DataTableExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DataTable::select('code_b1_b2_edgetape', 'width', 'angel', 'ga', 'compd', 'treat_code', 'belt_cord', 'direction', 'posisi_edgetape', 'edgetape_b1', 'turn', 'code_wraping', 'width_after_wraping')->get();
    }

	public function headings(): array
	{
		return [
			'Code B1/B2 Edgetape',
			'Width',
			'Angel',
			'Ga',
			'Compd',
			'Treat Code',
			'Belt Cord',
			'Direction',
			'Posisi Edgetape',
			'Edgetape B1',
			'Turn',
			'Code Wrapping',
			'Width After Wrapping',
		];
	}
}

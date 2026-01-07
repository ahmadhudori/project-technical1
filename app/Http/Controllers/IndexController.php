<?php

namespace App\Http\Controllers;

use App\Exports\DataTableExport;
use App\Imports\DataTableImport;
use App\Models\DataTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Maatwebsite\Excel\Facades\Excel;

class IndexController extends Controller
{
    public function index()
	{
		$datas = DataTable::all();
		return view('bead-steel.index', compact('datas'));
	}

	public function create()
	{
		return view('bead-steel.create');
	}

	public function store(Request $request)
	{
		// dd($request->direction);
		$validation = Validator::make($request->all(), [
			'code_b1_b2_edgetape' => 'required',
			'width' => 'required',
			'angel' => 'required',
			'ga' => 'required',
			'compd' => 'required',
			'treat_code' => 'required',
			'belt_cord' => 'required',
			'direction' => 'required',
			'posisi_edgetape' => 'required',
			'edgetape_b1' => 'required',
			'turn' => 'required',
			'code_wraping' => 'nullable',
			'width_after_wraping' => 'required_with:code_wraping',
		], [
			'code_b1_b2_edgetape.required' => 'Code B1/B2 Edgetape Harus Diisi',
			'width.required' => 'Width Harus Diisi',
			'angel.required' => 'Angel Harus Diisi',
			'ga.required' => 'Ga Harus Diisi',
			'compd.required' => 'Compd Harus Diisi',
			'treat_code.required' => 'Treat Code Harus Diisi',
			'belt_cord.required' => 'Belt Cord Harus Diisi',
			'direction.required' => 'Direction Harus Diisi',
			'posisi_edgetape.required' => 'Posisi Edgetape Harus Diisi',
			'edgetape_b1.required' => 'Edgetape B1 Harus Diisi',
			'turn.required' => 'Turn Harus Diisi',
			'width_after_wraping.required_with' => 'Width After Wraping Harus Diisi Jika Code Wrapping Diisi',
		]);

		if ($validation->fails()) {
			Alert::error(implode(', ', $validation->errors()->all()));
			return redirect()->back()->withErrors($validation)->withInput();
		} else {
			DataTable::create($request->all());
			Alert::success('Creating data success');
			return redirect()->route('dashboard');
		}
	}

	public function edit($id)
	{
		$data = DataTable::findOrFail($id);
		return view('bead-steel.editNew', compact('data'));
	}

	public function update(Request $request, $id)
	{
		$validation = Validator::make($request->all(), [
			'code_b1_b2_edgetape' => 'required',
			'width' => 'required',
			'angel' => 'required',
			'ga' => 'required',
			'compd' => 'required',
			'treat_code' => 'required',
			'belt_cord' => 'required',
			'direction' => 'required',
			'posisi_edgetape' => 'required',
			'edgetape_b1' => 'required',
			'turn' => 'required',
			'code_wraping' => 'nullable',
			'width_after_wraping' => 'required_with:code_wraping',
		], [
			'code_b1_b2_edgetape.required' => 'Code B1/B2 Edgetape Harus Diisi',
			'width.required' => 'Width Harus Diisi',
			'angel.required' => 'Angel Harus Diisi',
			'ga.required' => 'Ga Harus Diisi',
			'compd.required' => 'Compd Harus Diisi',
			'treat_code.required' => 'Treat Code Harus Diisi',
			'belt_cord.required' => 'Belt Cord Harus Diisi',
			'direction.required' => 'Direction Harus Diisi',
			'posisi_edgetape.required' => 'Posisi Edgetape Harus Diisi',
			'edgetape_b1.required' => 'Edgetape B1 Harus Diisi',
			'turn.required' => 'Turn Harus Diisi',
			'width_after_wraping.required_with' => 'Width After Wraping Harus Diisi jika Code Wrapping Diisi',
		]);

		if ($validation->fails()) {
			Alert::error(implode(', ', $validation->errors()->all()));
			return redirect()->back()->withErrors($validation)->withInput();
		}
		$data = DataTable::findOrFail($id);
		$data->update($request->all());
		Alert::success('Update data success');
		return redirect()->route('dashboard');
	}

	public function destroy($id)
	{
		$data = DataTable::findOrFail($id);
		$data->delete();
		Alert::success('Delete data success');
		return redirect()->route('dashboard');
	}

	public function import(Request $request)
	{
		try {
			$request->validate([
			'file' => 'required|mimes:csv,txt,xlsx'
		]);
		
		Excel::import(new DataTableImport, $request->file('file'));
		Alert::success('Import data success');
		return redirect()->route('dashboard');
		} catch (\Exception $e) {
			Alert::error($e->getMessage());
			return redirect()->route('dashboard');
		}
	}

	public function export(Request $request)
	{
		$format = $request->export_format;
		$file_name = 'Table-Steel' . now()->format('Ymd-His');

		if ($format == 'csv') {
			return Excel::download(new DataTableExport, $file_name . '.csv', \Maatwebsite\Excel\Excel::CSV);
		} elseif ($format == 'xlsx') {
			return Excel::download(new DataTableExport, $file_name . '.xlsx', \Maatwebsite\Excel\Excel::XLSX);
		} else {
			return Excel::download(new DataTableExport, $file_name . '.txt', \Maatwebsite\Excel\Excel::TSV);
		}
	}
}

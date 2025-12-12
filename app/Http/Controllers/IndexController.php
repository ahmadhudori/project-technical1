<?php

namespace App\Http\Controllers;

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
		return view('myview.index', compact('datas'));
	}

	public function store(Request $request)
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
			'code_wraping' => 'required',
			'width_after_wraping' => 'required',
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
			'code_wraping.required' => 'Code Wraping Harus Diisi',
			'width_after_wraping.required' => 'Width After Wraping Harus Diisi',
		]);

		if ($validation->fails()) {
			Alert::error(implode(', ', $validation->errors()->all()));
			return redirect()->back()->withErrors($validation)->withInput();
		} else {
			DataTable::create($request->all());
			Alert::success('Creating data success');
			return redirect()->back();
		}
	}

	public function edit($id)
	{
		$data = DataTable::findOrFail($id);
		return view('myview.edit', compact('data'));
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
			'code_wraping' => 'required',
			'width_after_wraping' => 'required',
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
			'code_wraping.required' => 'Code Wraping Harus Diisi',
			'width_after_wraping.required' => 'Width After Wraping Harus Diisi',
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
}

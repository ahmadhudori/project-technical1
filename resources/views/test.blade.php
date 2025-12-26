@extends('layouts.app')
@section('css')
	<link rel="stylesheet" href="{{ asset('asset/admin/extensions/simple-datatables/style.css') }}">

	<link rel="stylesheet" href="{{ asset('asset/admin/compiled/css/table-datatable.css') }}">
	{{-- <link rel="stylesheet" href="{{ asset('asset/admin/compiled/css/app.css') }}">
	<link rel="stylesheet" href="{{ asset('asset/admin/compiled/css/app-dark.css') }}"> --}}
<style>
	/* Custom styles for the index page */
	.small-table td, 
	.small-table th {
    font-size: 13px;  /* ukuran teks */
    padding: 4px 6px; /* padding kecil */
	text-align: center !important;
	vertical-align: middle !important;
}
	.modal-dialog-scrollable .modal-body {
    overflow-y: auto !important;
    max-height: calc(100vh - 200px) !important;
}

#sidebar {
    width: 280px;
}

</style>
@endsection
@section('content')
@include('sweetalert::alert')
<h1>Ini Halaman Index Myview</h1>
<div class="bg-white p-3 flex justify-between mb-3"> 
	<a href="{{ route('create') }}">
		<button type="button" class="px-5 py-2 bg-indigo-600 text-white rounded-md btn-shadow-sm">
		<i class="fas fa-plus fa-sm text-white-50"></i> Tambah 
		</button>
	</a>
	<div class="flex gap-3 items-center" x-data="{ open: false }">

		{{-- FORM IMPORT --}}
		<form id="importForm" action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
			@csrf

			<input
				type="file"
				id="fileInput"
				name="file"
				accept=".csv,.txt,.xlsx"
				class="hidden"
				onchange="document.getElementById('importForm').submit();"
			>

			<button
				type="button"
				onclick="document.getElementById('fileInput').click();"
				class="inline-flex items-center gap-2 rounded-md border border-green-500 px-3 py-1.5 text-sm font-medium text-green-600 hover:bg-green-50 focus:outline-none focus:ring-2 focus:ring-green-300"
			>
				<i class="fa fa-upload"></i>
				Import Data
			</button>
		</form>

		{{-- EXPORT BUTTON --}}
		<button
			type="button"
			@click="open = true"
			class="inline-flex items-center gap-2 rounded-md border border-red-500 px-3 py-1.5 text-sm font-medium text-red-600 hover:bg-red-50 focus:outline-none focus:ring-2 focus:ring-red-300"
		>
			<i class="fa fa-download"></i>
			Export Data
		</button>

		{{-- MODAL --}}
		<div
			x-show="open"
			x-transition
			class="fixed inset-0 z-50 flex items-center justify-center bg-black/50"
		>
			<div
				@click.outside="open = false"
				class="w-full max-w-md rounded-lg bg-white shadow-lg"
			>
				{{-- MODAL HEADER --}}
				<div class="flex items-center justify-between border-b px-4 py-3">
					<h3 class="text-lg font-semibold text-gray-800">
						Export Data
					</h3>
					<button
						type="button"
						@click="open = false"
						class="text-gray-400 hover:text-gray-600"
					>
						✕
					</button>
				</div>

				{{-- FORM EXPORT --}}
				<form action="{{ route('export') }}" method="GET">
					@csrf

					<div class="px-4 py-4">
						<label for="export_format" class="mb-2 block text-sm font-medium text-gray-700">
							Pilih Format Export
						</label>

						<select
							id="export_format"
							name="export_format"
							required
							class="w-full rounded-md border border-gray-300 px-3 py-2 text-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
						>
							<option value="csv">CSV</option>
							<option value="txt">TXT</option>
							<option value="xlsx">XLSX</option>
						</select>
					</div>

					{{-- MODAL FOOTER --}}
					<div class="flex justify-end gap-2 border-t px-4 py-3">
						<button
							type="button"
							@click="open = false"
							class="rounded-md border border-gray-300 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
						>
							Close
						</button>

						<button
							type="submit"
							class="rounded-md bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700 focus:ring-2 focus:ring-blue-300"
						>
							Export
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>

</div> 
<div class="bg-gray-50"> 
	<div class="card-body">
		<table class="table table-striped small-table" id="table1">
			<thead class="thead-dark">
					<tr>
						<th style="min-width: 90px !important;">NO</th> 
						<th style="min-width: 60px !important;">CODE B1/B2<br>EDGETAPE</th> 
						<th style="min-width: 60px !important;">CODE B2 NON<br>EDGETAPE</th> 
						<th style="min-width: 90px !important;">WIDTH</th> 
						<th>ANGEL</th> 
						<th>GA</th> 
						<th>COMPD</th> 
						<th style="min-width: 80px !important;">TREAT-CODE</th> 
						<th style="min-width: 95px !important;">BELT CODE</th> 
						<th style="min-width: 90px !important;">DIRECTION</th> 
						<th style="min-width: 90px !important;">POSISI EDGETAPE</th> 
						<th style="min-width: 150px !important;">EDGETAPE B1</th> 
						<th style="min-width: 90px !important;">TURN</th> 
						<th style="min-width: 90px !important;">CODE<br>WRAPING</th> 
						<th style="min-width: 90px !important;">WIDTH SETELAH<br>WRAPING</th> 
					</tr> 
				</thead> 
				<tbody>
					@foreach ($datas as $data)
						<tr> 
						<td>{{ $loop->iteration }}</td> 
						<td><a href="{{ route('edit', $data->id) }}">{{ $data->code_b1_b2_edgetape }}</a></td> 
						<td>{{ $data->code_b2 }}</td> 
						<td>{{ $data->width }}</td> 
						<td>{{ $data->angel }}</td> 
						<td>{{ $data->ga }}</td> 
						<td>{{ $data->compd }}</td> 
						<td>{{ $data->treat_code }}</td> 
						<td>{{ $data->belt_cord }}</td> 
						<td>
							@if ($data->direction == 'lay_left')
								LAY LEFT
							@elseif($data->direction == 'lay_right')
								LAY RIGHT
							@else
								LAY RIGHT/LEFT
							@endif
						</td> 
						<td>{{ $data->posisi_edgetape == 'atas' ? 'ATAS' : 'TIDAK ADA' }}</td> 
						<td>{{ $data->edgetape_b1 }}</td> 
						<td>{{ $data->turn == 'normal' ? 'NORMAL' : 'DI BALIK 2 KALI' }}</td> 
						<td>{{ $data->code_wraping }}</td> 
						<td>{{ $data->width_after_wraping }}</td> 
					</tr>
					@endforeach 
				</tbody>
		</table>
	</div>
</div> 
<!-- Modal Scrollable -->
@if ($errors->any())
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var myModal = new bootstrap.Modal(document.getElementById('exampleModalScrollable'));
        myModal.show();
    });
</script>
@endif
@endsection
@section('script')
	<script src="{{ asset('asset/admin/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
	<script src="{{ asset('asset/admin/static/js/pages/simple-datatables.js') }}"></script>
@endsection
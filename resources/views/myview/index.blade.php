@extends('layouts.app')
@section('content')
@include('sweetalert::alert')
<div class="bg-gray-800 p-3 flex justify-between mb-3"> 
	<a href="{{ route('dashboard.create') }}">
		<button type="button" class="px-5 py-2 bg-indigo-600 text-white rounded-md btn-shadow-sm hover:bg-indigo-800">
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
		<div class="overflow-x-auto">
			<table id="dataTable" class="min-w-full border border-gray-300 text-xs">
				<thead class="bg-gray-800 text-white">
					<tr>
						<th class="px-2 py-2 border">NO</th>
						<th class="px-2 py-2 border">CODE B1/B2 EDGETAPE</th>
						<th class="px-2 py-2 border">CODE B2 NON EDGETAPE</th>
						<th class="px-2 py-2 border">WIDTH</th>
						<th class="px-2 py-2 border">ANGEL</th>
						<th class="px-2 py-2 border">GA</th>
						<th class="px-2 py-2 border">COMPD</th>
						<th class="px-2 py-2 border">TREAT-CODE</th>
						<th class="px-2 py-2 border">BELT CODE</th>
						<th class="px-2 py-2 border">DIRECTION</th>
						<th class="px-2 py-2 border">POSISI EDGETAPE</th>
						<th class="px-2 py-2 border">EDGETAPE B1</th>
						<th class="px-2 py-2 border">TURN</th>
						<th class="px-2 py-2 border">CODE WRAPING</th>
						<th class="px-2 py-2 border">WIDTH SETELAH WRAPING</th>
					</tr>
				</thead>

				<tbody class="divide-y divide-gray-200">
					@foreach ($datas as $data)
						<tr class="odd:bg-white even:bg-gray-50 hover:bg-gray-100">
							<td class="px-2 py-1 border text-center">{{ $loop->iteration }}</td>
							<td class="px-2 py-1 border text-blue-600 hover:underline">
								<a href="{{ route('dashboard.edit', $data->id) }}">
									{{ $data->code_b1_b2_edgetape }}
								</a>
							</td>
							<td class="px-2 py-1 border">{{ $data->code_b2 }}</td>
							<td class="px-2 py-1 border">{{ $data->width }}</td>
							<td class="px-2 py-1 border">{{ $data->angel }}</td>
							<td class="px-2 py-1 border">{{ $data->ga }}</td>
							<td class="px-2 py-1 border">{{ $data->compd }}</td>
							<td class="px-2 py-1 border">{{ $data->treat_code }}</td>
							<td class="px-2 py-1 border">{{ $data->belt_cord }}</td>
							<td class="px-2 py-1 border">{{ $data->direction }}</td>
							<td class="px-2 py-1 border">{{ $data->posisi_edgetape }}</td>
							<td class="px-2 py-1 border">{{ $data->edgetape_b1 }}</td>
							<td class="px-2 py-1 border">{{ $data->turn }}</td>
							<td class="px-2 py-1 border">{{ $data->code_wraping }}</td>
							<td class="px-2 py-1 border">{{ $data->width_after_wraping }}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div> 
@endsection
@extends('layouts.layout')
@section('style')
<style>
	/* Custom styles for the index page */
	.small-table td, 
	.small-table th {
    font-size: 13px;  /* ukuran teks */
    padding: 4px 6px; /* padding kecil */
	text-align: center;
	vertical-align: middle !important;
	}
	.modal-dialog-scrollable .modal-body {
    overflow-y: auto !important;
    max-height: calc(100vh - 200px) !important;
	}

</style>
@endsection
@section('content')
@include('sweetalert::alert')
<h1>Ini Halaman Index Myview</h1>
<div class="card-header py-3 mb-3 d-flex justify-content-between align-items-center"> 
	<a href="{{ route('create') }}">
		<button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#exampleModalScrollable">
	<i class="fas fa-plus fa-sm text-white-50"></i> Tambah 
	</button>
	</a>
	<div class="d-flex">
		{{-- form import --}}
		<form id="importForm" action="{{ route('import') }}" method="POST" enctype="multipart/form-data" class="mr-2">
			@csrf
			<input type="file" id="fileInput" name="file" accept=".csv,.txt,.xlsx" style="display: none;" onchange="document.getElementById('importForm').submit();">
			<button type="button" class="btn btn-outline-success btn-sm" onclick="document.getElementById('fileInput').click();">
				<i class="fa fa-upload"></i> Import Data
			</button>
		</form>
		{{-- form export --}}
		<div>
			<button type="submit" class="btn btn-outline-danger btn-sm btn-shadow-sm" data-toggle="modal" data-target="#modalExport">
				<i class="fa fa-download"></i> Export Data
			</button>
			<!-- Modal -->
			<div class="modal fade" id="modalExport" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form action="{{ route('export') }}" method="GET" id="exportForm">
							@csrf
							<div class="modal-body">
								<div class="form-group">
									<label for="export_format">Pilih Format Export:</label>
									<select class="custom-select" id="export_format" name="export_format" required>
										<option value="csv">CSV</option>
										<option value="txt">TXT</option>
										<option value="xlsx">XLSX</option>
									</select>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary">Export</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div> 
	</div>
</div> 
<div class="d-sm-flex align-items-center justify-content-between mb-4 overflow-auto"> 
	<div class="card-body"> 
		<div class="table-responsive"> 
			<table class="table table-sm table-bordered table-striped small-table" id="dataTable" width="100%" cellspacing="0">
				<thead class="thead-dark">
					<tr>
					<th>NO</th> 
					<th>CODE B1/B2 EDGETAPE</th> 
					<th>CODE B2 NON EDGETAPE</th> 
					<th>WIDTH</th> 
					<th>ANGEL</th> 
					<th>GA</th> 
					<th>COMPD</th> 
					<th>TREAT-CODE</th> 
					<th style="min-width: 95px;">BELT CODE</th> 
					<th>DIRECTION</th> 
					<th>POSISI EDGETAPE</th> 
					<th style="min-width: 150px">EDGETAPE B1</th> 
					<th>TURN</th> 
					<th>CODE WRAPING</th> 
					<th>WIDTH SETELAH WRAPING</th> 
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
						<td>{{ $data->direction }}</td> 
						<td>{{ $data->posisi_edgetape }}</td> 
						<td>{{ $data->edgetape_b1 }}</td> 
						<td>{{ $data->turn }}</td> 
						<td>{{ $data->code_wraping }}</td> 
						<td>{{ $data->width_after_wraping }}</td> 
					</tr>
					@endforeach 
				</tbody> 
			</table> 
		</div> 
	</div> 
</div> 
 
@if ($errors->any())
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var myModal = new bootstrap.Modal(document.getElementById('exampleModalScrollable'));
        myModal.show();
    });
</script>
@endif
@endsection
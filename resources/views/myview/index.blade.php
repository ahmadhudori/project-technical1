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
</div> 
 
<!-- Modal Add Barang -->
{{-- <div class="modal fade" id="exampleModalScrollable" tabindex="1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true"> 
	<div class="modal-dialog modal-dialog-scrollable" role="document">
		<div class="modal-content"> 
			<div class="modal-header"> 
				<h5 class="modal-title" id="exampleModalScrollableTitle">Tambah Data</h5> 
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
					<span aria-hidden="true">&times;</span> 
				</button> 
			</div> 
			<form action="{{ route('store') }}" method="POST"> 
				@csrf 
				<div class="modal-body"> 
					<div class="form-group"> 
						<label for="code_b1_b2_edgetape">CODE B1/B2 EDGETAPE</label> 
						<input type="text" name="code_b1_b2_edgetape" id="code_b1_b2_edgetape" class="form-control" maxlength="10"  value="{{ old('code_b1_b2_edgetape') }}" required > 
					</div> 
					<div class="form-group"> 
						<label for="code_b2">CODE B2 NON EDGETAPE</label> 
						<input type="text" name="code_b2" id="code_b2" class="form-control" > 
					</div> 
					<div class="form-group"> 
						<label for="width">WIDTH</label> 
						<input type="number" name="width" id="width" class="form-control" step="any" > 
					</div> 
					<div class="form-group"> 
						<label for="angel">ANGEL</label> 
						<input type="number" name="angel" id="angel" class="form-control"> 
					</div> 
					<div class="form-group"> 
						<label for="ga">GA</label> 
						<input type="number" name="ga" id="ga" class="form-control" > 
					</div> 
					<div class="form-group"> 
						<label for="compd">COMPD</label> 
						<input type="text" name="compd" id="compd" class="form-control" > 
					</div> 
					<div class="form-group"> 
						<label for="treat_code">TREAT-CODE</label> 
						<input type="text" name="treat_code" id="treat_code" class="form-control"> 
					</div> 
					<div class="form-group"> 
						<label for="belt_cord">BELT CODE</label> 
						<input type="text" name="belt_cord" id="belt_cord" class="form-control"> 
					</div> 
					<div class="form-group"> 
						<label for="direction">DIRECTION</label> 
						<input type="text" name="direction" id="direction" class="form-control"> 
					</div> 
					<div class="form-group"> 
						<label for="posisi_edgetape">POSISI EDGETAPE</label> 
						<input type="text" name="posisi_edgetape" class="form-control" id="posisi_edgetape" > 
					</div> 
					<div class="form-group"> 
						<label for="edgetape_b1">EDGETAPE B1</label> 
						<input type="text" name="edgetape_b1" id="edgetape_b1" class="form-control" > 
					</div> 
					<div class="form-group"> 
						<label for="turn">TURN</label> 
						<input type="text" name="turn" id="turn" class="form-control"> 
					</div> 
					<div class="form-group"> 
						<label for="code_wraping">CODE WRAPING</label> 
						<input type="text" name="code_wraping" id="code_wraping" class="form-control"> 
					</div> 
					<div class="form-group"> 
						<label for="width_after_wraping">WIDTH SETELAH WRAPING</label> 
						<input type="number" name="width_after_wraping" id="width_after_wraping" class="form-control"> 
					</div> 
				</div> 
				<div class="modal-footer"> 
					<button type="button" class="btn btn-secondary" data-dismiss="modal"> Batal</button> 
					<input type="submit" class="btn btn-primary btn-send" value="Simpan"> 
				</div>  
			</form> 
		</div>
	</div> 
</div> --}}
@if ($errors->any())
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var myModal = new bootstrap.Modal(document.getElementById('exampleModalScrollable'));
        myModal.show();
    });
</script>
@endif
@endsection
@extends('layouts.layout')
@section('style')
<style>
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    input[type=number] {
        -moz-appearance: textfield;
    }
</style>
@endsection
@section('content')
@include('sweetalert::alert')
<form action="{{ route('update', $data->id) }}" method="POST"> 
    @csrf 
	@method('PUT')
    <fieldset> 
        <legend>Ubah Data Steel</legend> 
        <div class="form-group row">
			 {{-- CODE B1/B2 EDGETAPE  --}}
            <div class="col-md-5 mb-3" > 
                <label for="code_b1_b2_edgetape" class="@error('code_b1_b2_edgetape') text-danger @enderror">CODE B1/B2 EDGETAPE</label> 
                <input class="form-control" type="text" id="code_b1_b2_edgetape" name="code_b1_b2_edgetape"  maxlength="10"  value="{{ old('code_b1_b2_edgetape', $data->code_b1_b2_edgetape) }}" required > 
            </div>
			 {{-- CODE B2 NON EDGETAPE  --}} 
            <div class="col-md-5 mb-3"> 
                <label for="code_b2" class="@error('code_b2') text-danger @enderror">CODE B2 NON EDGETAPE</label> 
                <input name="code_b2" id="code_b2"  type="text" class="form-control" value="{{ old('code_b2', $data->code_b2) }}"> 
            </div> 
			 {{-- WIDTH  --}}
            <div class="col-md-5 mb-3"> 
                <label for="width" class="@error('width') text-danger @enderror">WIDTH</label> 
                <input type="number" name="width" id="width"  class="form-control" value="{{ old('width', $data->width) }}" step="any"> 
            </div> 
			 {{-- ANGEL  --}}
            <div class="col-md-5 mb-3"> 
                <label for="angel" class="@error('angel') text-danger @enderror">ANGEL</label> 
                <input id="addhargajual" type="number" step="any" name="angel" id="angel" class="form-control" value="{{ old('angel', $data->angel) }}"> 
            </div> 
			 {{-- GA  --}}
            <div class="col-md-5 mb-3"> 
                <label for="ga" class="@error('ga') text-danger @enderror">GA</label> 
                <input type="number" step="any" name="ga" id="ga" class="form-control" value="{{ old('ga', $data->ga) }}"> 
            </div>
			 {{-- COMPD  --}} 
            <div class="col-md-5 mb-3"> 
                <label for="compd" class="@error('compd') text-danger @enderror">COMPD</label> 
                <input type="text" name="compd" id="compd" class="form-control" value="{{ old('compd', $data->compd) }}"> 
            </div>
			
			 {{-- TREAT-CODE  --}}
            <div class="col-md-5 mb-3"> 
                <label for="treat_code" class="@error('treat_code') text-danger @enderror">TREAT-CODE</label> 
                <input type="text" name="treat_code" id="treat_code" class="form-control" value="{{ old('treat_code', $data->treat_code) }}"> 
            </div>
			 {{-- BELT CODE  --}} 
            <div class="col-md-5 mb-3"> 
                <label for="belt_cord" class="@error('belt_cord') text-danger @enderror">BELT CODE</label> 
                <input type="text" name="belt_cord" id="belt_cord" class="form-control" value="{{ old('belt_cord', $data->belt_cord) }}"> 
            </div>
			 {{-- DIRECTION  --}} 
            <div class="col-md-5 mb-3"> 
                <label for="direction" class="@error('direction') text-danger @enderror">DIRECTION</label> 
                <div class="input-group mb-3">
					<select class="custom-select" id="direction" name="direction">
						<option value="">Choose...</option>
						<option value="LAY RIGHT" @selected(old('direction', $data->direction)  == 'LAY RIGHT')>LAY RIGHT</option>
						<option value="LAY LEFT" @selected(old('direction', $data->direction) == 'LAY LEFT')>LAY LEFT</option>
						<option value="LAY RIGHT/LEFT" @selected(old('direction', $data->direction) == 'LAY RIGHT/LEFT')>LAY RIGHT/LEFT</option>
					</select>
					<div class="input-group-append">
						<label class="input-group-text" for="inputGroupSelect02">Options</label>
					</div>
				</div> 
            </div>
						{{-- {{ dd($data->direction) }} --}}
			 {{-- POSISI EDGETAPE  --}} 
            <div class="col-md-5 mb-3"> 
                <label for="posisi_edgetape" class="@error('posisi_edgetape') text-danger @enderror">POSISI EDGETAPE</label> 
                <div class="input-group mb-3">
					<select class="custom-select" id="posisi_edgetape" name="posisi_edgetape">
						<option value="">Choose...</option>
						<option value="ATAS" @selected(old('posisi_edgetape') || $data->posisi_edgetape == 'ATAS' || $data->posisi_edgetape == 'atas')>ATAS</option>
						<option value="TIDAK ADA" @selected(old('posisi_edgetape') || $data->posisi_edgetape == 'TIDAK ADA' || $data->posisi_edgetape == 'tidak ada')>TIDAK ADA</option>
					</select>
					<div class="input-group-append">
						<label class="input-group-text" for="inputGroupSelect02">Options</label>
					</div>
				</div> 
            </div> 
			 {{-- EDGETAPE B1  --}}
            <div class="col-md-5 mb-3"> 
                <label for="edgetape_b1" class="@error('edgetape_b1') text-danger @enderror">EDGETAPE B1</label> 
                <input type="text" name="edgetape_b1" id="edgetape_b1" class="form-control" value="{{ old('edgetape_b1', $data->edgetape_b1) }}"> 
            </div>
			 {{-- TURN  --}} 
            <div class="col-md-5 mb-3"> 
                <label for="turn" class="@error('turn') text-danger @enderror">TURN</label> 
                <div class="input-group mb-3">
					<select class="custom-select" id="turn" name="turn">
						<option value="">Choose...</option>
						<option value="NORMAL" @selected(old('turn') || $data->turn == 'NORMAL' || $data->turn == 'normal')>NORMAL</option>
						<option value="DIBALIK 2 KALI" @selected(old('turn') || $data->turn == 'DIBALIK 2 KALI' || $data->turn == 'dibalik 2 kali')>DI BALIK 2 KALI</option>
					</select>
					<div class="input-group-append">
						<label class="input-group-text" for="inputGroupSelect02">Options</label>
					</div>
				</div> 
            </div> 
			 {{-- CODE WRAPING  --}}
            <div class="col-md-5 mb-3"> 
                <label for="code_wraping" class="@error('code_wraping') text-danger @enderror">CODE WRAPING</label> 
                <input type="text" name="code_wraping" id="code_wraping" class="form-control" value="{{ old('code_wraping', $data->code_wraping) }}"> 
            </div> 
			 {{-- WIDTH SETELAH WRAPING  --}}
            <div class="col-md-5 mb-3"> 
                <label for="width_after_wraping" class="@error('width_after_wraping') text-danger @enderror">WIDTH SETELAH WRAPING</label> 
                <input type="number" step="any" name="width_after_wraping" id="width_after_wraping" class="form-control" value="{{ old('width_after_wraping', $data->width_after_wraping) }}"> 
            </div> 
    </fieldset> 
    <div class="col-md-10"> 
        <input type="submit" class="btn btn-success btn-send" value="Update"> 
        <a href="{{ route('dashboard') }}"><input type="Button" class="btn btn-primary btn-send" value="Kembali"></a> 
    </div> 
    <hr> 
</form> 
@endsection
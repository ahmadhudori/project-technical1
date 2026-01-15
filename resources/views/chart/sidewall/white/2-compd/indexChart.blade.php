@extends('layouts.app')
@push('css')
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
@endpush
@section('content')
@include('sweetalert::alert')
	<div class="max-w-[90rem] mx-auto p-6">
		<h1 class="text-3xl dark:text-gray-300 text-center font-semibold m-4">White Sidewall 2 Compound</h1>
		<form action="{{ route('chart.chart-white-sidewall-2-compd') }}" method="POST" class="flex">
			@csrf
			<div class="mx-auto px-5">
				<fieldset class="mb-4 p-4 border rounded bg-gray-50 dark:bg-gray-600">
					<legend class="text-lg font-semibold dark:text-gray-300 text-indigo-950">Left Width</legend>
					{{-- Width Total --}}
					<div class="flex gap-3 items-center">
						<label class="w-24 font-semibold mb-2 dark:dark:text-gray-300 text-indigo-950">Width Total</label>
						<div class="flex gap-2 overflow-x-auto mb-5">
							@for ($i=1; $i<= 20; $i++)
								
								<input type="number" name="{{ 'lw'.$i }}" @readonly($i === 1) value="{{ old('lw'.$i, $i === 1 ? 0 : '') }}" class="{{ $i === 1 ? 'bg-yellow-200 ms-1' : ' bg-slate-100' }} {{ $i === 20 ? 'me-1' : '' }} w-10 px-2 mt-1 py-1 border rounded text-center focus:ring focus:ring-blue-300" step="any">
							@endfor
						</div>
					</div>

					{{-- GA Total --}}
					<div class="flex gap-3 items-center">
						<label class="w-24 font-semibold mb-2 dark:text-gray-300 text-indigo-950">GA Total</label>
						<div class="flex gap-2 overflow-x-auto mb-5">
							@for ($i=1; $i<= 20; $i++)
								<input type="number" name="{{ 'lg'.$i }}" class="{{ $i === 1 ? 'ms-1' : ($i === 20 ? 'me-1' : '') }} w-10 bg-slate-100 px-2 py-1 mt-1 border rounded text-center focus:ring focus:ring-blue-300" step="any" value="{{ old('lg'.$i) }}">
							@endfor
						</div>
					</div>
					
					
					{{-- GA BEC --}}
					<div class="flex gap-3 items-center">
						<label class="w-24 font-semibold mb-2 dark:text-gray-300 text-indigo-950">GA BEC</label>
						<div class="flex gap-2 overflow-x-auto mb-5">
							@for ($i=1; $i<= 20; $i++)
								
								<input type="number" name="{{ 'lgbec'.$i }}" class="{{ $i === 1 ? 'ms-1' : '' }} w-10 bg-slate-100 px-2 py-1 mt-1 border rounded text-center focus:ring focus:ring-blue-300" step="any" value="{{ old('lgbec'.$i) }}">
							@endfor
						</div>
					</div>
				</fieldset>
				<fieldset class="mb-4 p-4 border rounded bg-gray-50 dark:bg-gray-600">
					<legend class="text-lg font-semibold dark:text-gray-300 text-indigo-950">Right Width</legend>
					{{-- Width Total --}}
					<div class="flex gap-3 items-center mt-2">
						<label class="w-24 font-semibold mb-2 dark:dark:text-gray-300 text-indigo-950">Width Total</label>
						<div class="flex gap-2 overflow-x-auto mb-5">
							@for ($i=1; $i<= 20; $i++)
								
								<input type="number" name="{{ 'rw'.$i }}" @readonly($i === 1) value="{{ old('rw'.$i, $i === 1 ? 0 : '') }}" class="{{ $i === 1 ? 'bg-yellow-200 ms-1' : ' bg-slate-100' }} {{ $i === 20 ? 'me-1' : '' }} w-10 px-2 mt-1 py-1 border rounded text-center focus:ring focus:ring-blue-300" step="any">
							@endfor
						</div>
					</div>

					{{-- GA Total --}}
					<div class="flex gap-3 items-center">
						<label class="w-24 font-semibold mb-2 dark:text-gray-300 text-indigo-950">GA Total</label>
						<div class="flex gap-2 overflow-x-auto mb-5">
							@for ($i=1; $i<= 20; $i++)
								<input type="number" name="{{ 'rg'.$i }}" class="{{ $i === 1 ? 'ms-1' : ($i === 20 ? 'me-1' : '') }} w-10 bg-slate-100 px-2 py-1 mt-1 border rounded text-center focus:ring focus:ring-blue-300" step="any" value="{{ old('rg'.$i) }}">
							@endfor
						</div>
					</div>
					
					
					{{-- GA BEC --}}
					<div class="flex gap-3 items-center">
						<label class="w-24 font-semibold mb-2 dark:text-gray-300 text-indigo-950">GA BEC</label>
						<div class="flex gap-2 overflow-x-auto mb-5">
							@for ($i=1; $i<= 20; $i++)
								
								<input type="number" name="{{ 'rgbec'.$i }}" class="{{ $i === 1 ? 'ms-1' : '' }} w-10 bg-slate-100 px-2 py-1 mt-1 border rounded text-center focus:ring focus:ring-blue-300" step="any" value="{{ old('rgbec'.$i) }}">
							@endfor
						</div>
					</div>

					{{-- White Width --}}
					<div class="flex gap-3 items-center">
						<label class="w-24 font-semibold mb-2 dark:text-gray-300 text-indigo-950">White Width</label>
						<div class="flex gap-2 overflow-x-auto mb-5">
							@for ($i=1; $i<= 20; $i++)
								
								<input type="number" name="{{ 'ww'.$i }}" @readonly($i === 1) class="{{ $i === 1 ? 'ms-1 bg-yellow-200' : '' }} w-10 bg-slate-100 px-2 py-1 mt-1 border rounded text-center focus:ring focus:ring-blue-300" step="any" value="{{ old('ww'.$i, $i === 1 ? 0 : '') }}">
							@endfor
						</div>
					</div>

					{{-- White Ga --}}
					<div class="flex gap-3 items-center">
						<label class="w-24 font-semibold mb-2 dark:text-gray-300 text-indigo-950">White GA Width</label>
						<div class="flex gap-2 overflow-x-auto mb-5">
							@for ($i=1; $i<= 20; $i++)
								
								<input type="number" name="{{ 'wg'.$i }}" class="{{ $i === 1 ? 'ms-1' : '' }} w-10 bg-slate-100 px-2 py-1 mt-1 border rounded text-center focus:ring focus:ring-blue-300" step="any" value="{{ old('wg'.$i) }}">
							@endfor
						</div>
					</div>
				</fieldset>
				<div class="mt-7">
					<button
						type="submit"
						class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition"
					>
						Generate Chart
					</button>
				</div>
			</div>
			<hr>
		</form>
	</div>
@endsection
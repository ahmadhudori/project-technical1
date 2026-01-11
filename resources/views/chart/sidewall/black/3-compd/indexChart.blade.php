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
		<h1 class="text-3xl dark:text-gray-300 text-center font-semibold m-4">Black Sidewall 3 compound</h1>
		<form action="{{ route('chart.chart-black-sidewall-3-compd') }}" method="POST" class="flex">
			@csrf
			<div class="mx-auto px-5">
				{{-- Width Total --}}
				<div class="flex gap-3 items-center">
					<label class="w-24 font-semibold mb-2 dark:dark:text-gray-300 text-indigo-950">Width Total</label>
					<div class="flex gap-2 overflow-x-auto mb-5">
						@for ($i=1; $i<= 20; $i++)
							
							<input type="number" name="{{ 'w'.$i }}" @readonly($i === 1) value="{{ old('w'.$i, $i === 1 ? 0 : '') }}" class="{{ $i === 1 ? 'bg-yellow-200 ms-1' : ' bg-slate-100' }} {{ $i === 20 ? 'me-1' : '' }} w-10 px-2 mt-1 py-1 border rounded text-center focus:ring focus:ring-blue-300" step="any">
						@endfor
					</div>
				</div>

				{{-- GA Total --}}
				<div class="flex gap-3 items-center">
					<label class="w-24 font-semibold mb-2 dark:text-gray-300 text-indigo-950">GA Total</label>
					<div class="flex gap-2 overflow-x-auto mb-5">
						@for ($i=1; $i<= 20; $i++)
							<input type="number" name="{{ 'g'.$i }}" class="{{ $i === 1 ? 'ms-1' : ($i === 20 ? 'me-1' : '') }} w-10 bg-slate-100 px-2 py-1 mt-1 border rounded text-center focus:ring focus:ring-blue-300" step="any" value="{{ old('g'.$i) }}">
						@endfor
					</div>
				</div>
				
				
				{{-- GA BE --}}
				<div class="flex gap-3 items-center">
					<label class="w-24 font-semibold mb-2 dark:text-gray-300 text-indigo-950">GA BE</label>
					<div class="flex gap-2 overflow-x-auto mb-5">
						@for ($i=1; $i<= 6; $i++)
							
							<input type="number" name="{{ 'gbe'.$i }}" class="{{ $i == 6 ? 'hidden' : '' }} {{ $i === 1 ? 'ms-1' : '' }} w-10 bg-slate-100 px-2 py-1 mt-1 border rounded text-center focus:ring focus:ring-blue-300" step="any" value="{{ old('gbe'.$i) }}">
						@endfor
					</div>
				</div>

				{{-- RC --}}
				<div class="flex gap-3 items-center">
					<label class="w-24 font-semibold mb-2 dark:text-gray-300 text-indigo-950">RC</label>
					<div class="flex gap-2 overflow-x-auto mb-5">
						@for ($i = 0; $i < 20; $i++)
							<input
								type="number"
								step="any"
								name="{{ 'rc'.$i }}"
								class="{{ $i === 0 ? 'ms-1' : ($i === 19 ? 'me-1' : '') }} w-10 bg-slate-100 px-2 py-1 mt-1 border rounded text-center focus:ring focus:ring-blue-300"
								value="{{ old('rc'. $i) }}"
							>
						@endfor
					</div>
				</div>

				{{-- GA RC --}}
				<div class="flex gap-3 items-center">
					<label class="w-24 font-semibold mb-2 dark:text-gray-300 text-indigo-950">GA RC</label>
					<div class="flex gap-2 overflow-x-auto mb-5">
						@for ($i = 0; $i < 20; $i++)
							<input
								type="number"
								step="any"
								name="{{ 'ga_rc'.$i }}"
								class="{{ $i === 0 ? 'ms-1' : ($i === 19 ? 'me-1' : '') }} w-10 bg-slate-100 px-2 py-1 mt-1 border rounded text-center focus:ring focus:ring-blue-300"
								value="{{ old('rc'. $i) }}"
							>
						@endfor
					</div>
				</div>

				<div class="mt-7">
					<button
						type="submit"
						class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition"
					>
						Generate Chart
					</button>
				</div>
			</div>
		</form>
	</div>
@endsection
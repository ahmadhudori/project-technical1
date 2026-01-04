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
	<div class="max-w-[90rem] mx-auto p-6">
		<form action="{{ route('chart') }}" method="POST" class="flex">
			@csrf
			<div class="mx-auto px-5">
				{{-- Width Total --}}
				<label class="block font-semibold mb-2 text-gray-300">Width Total</label>
				<div class="flex gap-2 overflow-x-auto pb-5">
					@for ($i=1; $i<= 20; $i++)
						
						<input type="number" name="{{ 'w'.$i }}" @readonly($i === 1) value="{{ $i === 1 ? 0 : '' }}" class="{{ $i === 1 ? 'bg-yellow-200 ms-1' : ' bg-slate-100' }} {{ $i === 20 ? 'me-1' : '' }} w-14 px-2 mt-1 py-1 border rounded text-center focus:ring focus:ring-blue-300" step="any">
					@endfor
				</div>

				{{-- GA Total --}}
				<label class="block font-semibold mb-2 text-gray-300">GA Total</label>
				<div class="flex gap-2 overflow-x-auto pb-5">
					@for ($i=1; $i<= 20; $i++)
						<input type="number" name="{{ 'g'.$i }}" class="{{ $i === 1 ? 'ms-1' : ($i === 20 ? 'me-1' : '') }} w-14 bg-slate-100 px-2 py-1 mt-1 border rounded text-center focus:ring focus:ring-blue-300" step="any">
					@endfor
				</div>
				
				
				{{-- GA BEC --}}
				<label class="block font-semibold mb-2 text-gray-300">GA BEC</label>
				<div class="flex gap-2 overflow-x-auto pb-5">
					@for ($i=1; $i<= 6; $i++)
						
						<input type="number" name="{{ 'gbec'.$i }}" class="{{ $i == 6 ? 'hidden' : '' }} {{ $i === 1 ? 'ms-1' : '' }} w-14 bg-slate-100 px-2 py-1 mt-1 border rounded text-center focus:ring focus:ring-blue-300" step="any">
					@endfor
				</div>
				@php
					$fields = [
						'rc'     => 'GA RC',
					];
				@endphp

				@foreach ($fields as $name => $label)
					<label class="block font-semibold mb-2 text-gray-300">{{ $label }}</label>
					<div class="flex gap-2 overflow-x-auto pb-5">
						@for ($i = 0; $i < 20; $i++)
							<input
								type="number"
								step="any"
								name="{{ $name }}[]"
								class="{{ $i === 0 ? 'ms-1' : ($i === 19 ? 'me-1' : '') }} w-14 bg-slate-100 px-2 py-1 mt-1 border rounded text-center focus:ring focus:ring-blue-300"
								placeholder=""
							>
						@endfor
					</div>
				@endforeach

				{{-- Width RC1 --}}
				<label class="block font-semibold mb-2 text-gray-300">Width RC1</label>
				<div class="flex gap-2 overflow-x-auto pb-5">
					@for ($i=1; $i<= 20; $i++)
						<input type="number" name="{{ 'wrc1_'.$i }}" class="{{ $i === 1 ? 'ms-1' : ($i === 20 ? 'me-1' : '') }} w-14 bg-slate-100 px-2 py-1 mt-1 border rounded text-center focus:ring focus:ring-blue-300" step="any">
					@endfor
				</div>


				{{-- GA RC1 --}}
				<label class="block font-semibold mb-2 text-gray-300">GA RC1</label>
				<div class="flex gap-2 overflow-x-auto pb-5">
					@for ($i=1; $i<= 20; $i++)
						<input type="number" name="{{ 'garc1_'.$i }}" class="{{ $i === 1 ? 'ms-1' : ($i === 20 ? 'me-1' : '') }} w-14 bg-slate-100 px-2 py-1 mt-1 border rounded text-center focus:ring focus:ring-blue-300" step="any">
					@endfor
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
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	@vite(['resources/css/app.css', 'resources/js/app.js'])
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
</head>
<body>
	<div class="max-w-[90rem] mx-auto p-6">
		<form action="{{ route('cart') }}" method="POST" class="flex">
			@csrf
			<div class="mx-auto">
				{{-- Width Total --}}
				<label class="block font-semibold mb-2">Width Total</label>
				<div class="flex gap-2 overflow-x-auto pb-5">
					@for ($i=1; $i<= 20; $i++)
						
						<input type="number" name="{{ 'w'.$i }}" @readonly($i === 1) value="{{ $i === 1 ? 0 : '' }}" class="{{ $i === 1 ? 'bg-yellow-200' : '' }} w-14 px-2 py-1 border rounded text-center focus:ring focus:ring-blue-300" step="any">
					@endfor
				</div>

				{{-- GA Total --}}
				<label class="block font-semibold mb-2">GA Total</label>
				<div class="flex gap-2 overflow-x-auto pb-5">
					@for ($i=1; $i<= 20; $i++)
						<input type="number" name="{{ 'g'.$i }}" class="w-14 px-2 py-1 border rounded text-center focus:ring focus:ring-blue-300" step="any">
					@endfor
				</div>
				@php
					$fields = [
						'bec'    => 'GA BEC',
						'rc'     => 'GA RC',
					];
				@endphp

				@foreach ($fields as $name => $label)
					<label class="block font-semibold mb-2">{{ $label }}</label>
					<div class="flex gap-2 overflow-x-auto pb-5">
						@for ($i = 0; $i < 20; $i++)
							<input
								type="number"
								step="any"
								name="{{ $name }}[]"
								class="w-14 px-2 py-1 border rounded text-center focus:ring focus:ring-blue-300"
								placeholder=""
							>
						@endfor
					</div>
				@endforeach
				{{-- Width RC1 --}}
				<label class="block font-semibold mb-2">Width RC1</label>
				<div class="flex gap-2 overflow-x-auto pb-5">
					@for ($i=1; $i<= 20; $i++)
						<input type="number" name="{{ 'wrc1_'.$i }}" class="w-14 px-2 py-1 border rounded text-center focus:ring focus:ring-blue-300" step="any">
					@endfor
				</div>

				{{-- GA RC1 --}}
				<label class="block font-semibold mb-2">GA RC1</label>
				<div class="flex gap-2 overflow-x-auto pb-5">
					@for ($i=1; $i<= 20; $i++)
						<input type="number" name="{{ 'garc1_'.$i }}" class="w-14 px-2 py-1 border rounded text-center focus:ring focus:ring-blue-300" step="any">
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

</body>
</html>
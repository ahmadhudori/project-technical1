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

<form action="{{ route('update', $data->id) }}" method="POST" class="max-w-screen-lg space-y-6 mx-auto">
    @csrf
    @method('PUT')

    <fieldset class="border border-gray-300 rounded-lg p-6">
        <legend class="px-2 text-lg font-semibold text-gray-300">
            Ubah Data Steel
        </legend>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            {{-- CODE B1/B2 EDGETAPE --}}
            <div>
                <label for="code_b1_b2_edgetape"
                    @class([
                        'block mb-1 text-sm font-medium',
                        'text-red-600' => $errors->has('code_b1_b2_edgetape'),
                        'text-gray-300' => !$errors->has('code_b1_b2_edgetape'),
                    ])>
                    CODE B1/B2 EDGETAPE
                </label>
                <input type="text" id="code_b1_b2_edgetape" name="code_b1_b2_edgetape"
                    maxlength="10" required
                    value="{{ old('code_b1_b2_edgetape', $data->code_b1_b2_edgetape) }}"
                    class="w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
            </div>

            {{-- CODE B2 NON EDGETAPE --}}
            <div>
                <label for="code_b2" @class([
                        'block mb-1 text-sm font-medium',
                        'text-red-600' => $errors->has('code_b2'),
                        'text-gray-300' => !$errors->has('code_b2'),
                    ])>
                    CODE B2 NON EDGETAPE
                </label>
                <input type="text" id="code_b2" name="code_b2"
                    value="{{ old('code_b2', $data->code_b2) }}"
                    class="w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
            </div>

            {{-- WIDTH --}}
            <div>
                <label for="width" @class([
                        'block mb-1 text-sm font-medium',
                        'text-red-600' => $errors->has('width'),
                        'text-gray-300' => !$errors->has('width'),
                    ])>WIDTH</label>
                <input type="number" step="any" id="width" name="width"
                    value="{{ old('width', $data->width) }}"
                    class="w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
            </div>

            {{-- ANGEL --}}
            <div>
                <label for="angel" @class([
                        'block mb-1 text-sm font-medium',
                        'text-red-600' => $errors->has('angel'),
                        'text-gray-300' => !$errors->has('angel'),
                    ])>ANGEL</label>
                <input type="number" step="any" id="angel" name="angel"
                    value="{{ old('angel', $data->angel) }}"
                    class="w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
            </div>

            {{-- GA --}}
            <div>
                <label for="ga" @class([
                        'block mb-1 text-sm font-medium',
                        'text-red-600' => $errors->has('ga'),
                        'text-gray-300' => !$errors->has('ga'),
                    ])>GA</label>
                <input type="number" step="any" id="ga" name="ga"
                    value="{{ old('ga', $data->ga) }}"
                    class="w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
            </div>

            {{-- COMPD --}}
            <div>
                <label for="compd" @class([
                        'block mb-1 text-sm font-medium',
                        'text-red-600' => $errors->has('compd'),
                        'text-gray-300' => !$errors->has('compd'),
                    ])>COMPD</label>
                <input type="text" id="compd" name="compd"
                    value="{{ old('compd', $data->compd) }}"
                    class="w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
            </div>

            {{-- TREAT CODE --}}
            <div>
                <label for="treat_code" @class([
                        'block mb-1 text-sm font-medium',
                        'text-red-600' => $errors->has('treat_code'),
                        'text-gray-300' => !$errors->has('treat_code'),
                    ])>TREAT-CODE</label>
                <input type="text" id="treat_code" name="treat_code"
                    value="{{ old('treat_code', $data->treat_code) }}"
                    class="w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
            </div>

            {{-- BELT CODE --}}
            <div>
                <label for="belt_cord" @class([
                        'block mb-1 text-sm font-medium',
                        'text-red-600' => $errors->has('belt_cord'),
                        'text-gray-300' => !$errors->has('belt_cord'),
                    ])>BELT CODE</label>
                <input type="text" id="belt_cord" name="belt_cord"
                    value="{{ old('belt_cord', $data->belt_cord) }}"
                    class="w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
            </div>

            {{-- DIRECTION --}}
            <div>
                <label for="direction" @class([
                        'block mb-1 text-sm font-medium',
                        'text-red-600' => $errors->has('direction'),
                        'text-gray-300' => !$errors->has('direction'),
                    ])>DIRECTION</label>
                <select id="direction" name="direction"
                    class="w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                    <option value="">Choose...</option>
                    <option value="LAY RIGHT" @selected(old('direction', $data->direction) == 'LAY RIGHT')>LAY RIGHT</option>
                    <option value="LAY LEFT" @selected(old('direction', $data->direction) == 'LAY LEFT')>LAY LEFT</option>
                    <option value="LAY RIGHT/LEFT" @selected(old('direction', $data->direction) == 'LAY RIGHT/LEFT')>LAY RIGHT/LEFT</option>
                </select>
            </div>

            {{-- POSISI EDGETAPE --}}
            <div>
                <label for="posisi_edgetape" @class([
                        'block mb-1 text-sm font-medium',
                        'text-red-600' => $errors->has('posisi_edgetape'),
                        'text-gray-300' => !$errors->has('posisi_edgetape'),
                    ])>
                    POSISI EDGETAPE
                </label>
                <select id="posisi_edgetape" name="posisi_edgetape"
                    class="w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                    <option value="">Choose...</option>
                    <option value="ATAS" @selected(old('posisi_edgetape', strtoupper($data->posisi_edgetape)) == 'ATAS')>ATAS</option>
                    <option value="TIDAK ADA" @selected(old('posisi_edgetape', strtoupper($data->posisi_edgetape)) == 'TIDAK ADA')>TIDAK ADA</option>
                </select>
            </div>

            {{-- EDGETAPE B1 --}}
            <div>
                <label for="edgetape_b1" @class([
                        'block mb-1 text-sm font-medium',
                        'text-red-600' => $errors->has('edgetape_b1'),
                        'text-gray-300' => !$errors->has('edgetape_b1'),
                    ])>
                    EDGETAPE B1
                </label>
                <input type="text" id="edgetape_b1" name="edgetape_b1"
                    value="{{ old('edgetape_b1', $data->edgetape_b1) }}"
                    class="w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
            </div>

            {{-- TURN --}}
            <div>
                <label for="turn" @class([
                        'block mb-1 text-sm font-medium',
                        'text-red-600' => $errors->has('turn'),
                        'text-gray-300' => !$errors->has('turn'),
                    ])>TURN</label>
                <select id="turn" name="turn"
                    class="w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                    <option value="">Choose...</option>
                    <option value="NORMAL" @selected(old('turn', strtoupper($data->turn)) == 'NORMAL')>NORMAL</option>
                    <option value="DIBALIK 2 KALI" @selected(old('turn', strtoupper($data->turn)) == 'DIBALIK 2 KALI')>DI BALIK 2 KALI</option>
                </select>
            </div>

            {{-- CODE WRAPING --}}
            <div>
                <label for="code_wraping" @class([
                        'block mb-1 text-sm font-medium',
                        'text-red-600' => $errors->has('code_wraping'),
                        'text-gray-300' => !$errors->has('code_wraping'),
                    ])>
                    CODE WRAPING
                </label>
                <input type="text" id="code_wraping" name="code_wraping"
                    value="{{ old('code_wraping', $data->code_wraping) }}"
                    class="w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
            </div>

            {{-- WIDTH AFTER WRAPING --}}
            <div>
                <label for="width_after_wraping" @class([
                        'block mb-1 text-sm font-medium',
                        'text-red-600' => $errors->has('width_after_wraping'),
                        'text-gray-300' => !$errors->has('width_after_wraping'),
                    ])>
                    WIDTH SETELAH WRAPING
                </label>
                <input type="number" step="any" id="width_after_wraping" name="width_after_wraping"
                    value="{{ old('width_after_wraping', $data->width_after_wraping) }}"
                    class="w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
            </div>

        </div>
    </fieldset>

    {{-- BUTTON --}}
    <div class="flex gap-4">
        <button type="submit"
            class="px-6 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 flex items-center gap-2">
			<i class="fas fa-pencil-alt"></i>
            <span>Update</span>
        </button>

        <a href="{{ route('dashboard') }}"
            class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
            Kembali
        </a>

		<form action="{{ route('delete', $data->id) }}" method="post">
			@csrf
			@method('DELETE')
			<button
				type="submit"
				class="px-6 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 flex items-center gap-2"
				onclick="return confirm('Are you sure you want to delete this item?');"
			>
			<i class="fas fa-trash-alt"></i>
				<span>Delete</span>
			</button>
		</form>
    </div>

</form>
@endsection
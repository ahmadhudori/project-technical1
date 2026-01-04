<div>
	<form wire:submit.prevent="register" class="space-y-6">

		<!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" wire:model.defer="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

		<!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" wire:model.defer="email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

		<!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password"
							wire:model.defer="password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

		<!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password"
							wire:model.defer="password_confirmation" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

		{{-- Avatar --}}
		<div class="mt-4">
			<x-input-label for="avatar-input" :value="__('Foto Profile (Optional)')" />
			<div class="flex items-center gap-4 mt-3">
				<img
					src="{{ $avatar ? $avatar->temporaryUrl() : asset('asset/img/avatar2.png') }}"
					class="w-16 h-16 rounded-full object-cover border"
					alt="Avatar Preview"
				>

				<input type="file"
					id="avatar-input"
					wire:model="avatar"
					accept="image/*"
					class="text-sm text-gray-300">
			</div>
		</div>

		{{-- Loading indicator --}}
		<div wire:loading wire:target="avatar" class="text-sm text-gray-500">
			Uploading preview...
		</div>

		<div class="mt4">
			<a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
		</div>

		{{-- Submit --}}
		<button
			type="submit"
			class="w-full bg-indigo-600 text-white py-2 rounded-md hover:bg-indigo-700">
			Register
		</button>
	</form>
</div>

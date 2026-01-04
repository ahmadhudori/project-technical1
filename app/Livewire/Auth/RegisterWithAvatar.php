<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rules;

class RegisterWithAvatar extends Component
{
	use WithFileUploads;
	
	public $name;
	public $email;
	public $password;
	public $password_confirmation;
	public $avatar;
	
	public function rules() 
	{
		return [
			'name' => ['required', 'string', 'max:255'],
			'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
			'password' => ['required', 'confirmed', Rules\Password::defaults()],
			'avatar' => ['nullable', 'image', 'max:2048']
		];
	}

	public function register()
	{
		$this->validate();

		$avatarPath = null;
		if ($this->avatar) {
			$avatarPath = $this->avatar->store('avatars', 'public');
		}

		$user = User::create([
			'name' => $this->name,
			'email' => $this->email,
			'password' => Hash::make($this->password),
			'avatar' => $avatarPath
		]);

		$user->assignRole('MASTER_SPEC');

		return redirect(route('login'));
	}
	
    public function render()
    {
        return view('livewire.auth.register-with-avatar');
    }
}

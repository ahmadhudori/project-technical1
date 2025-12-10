<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userPpc = User::create([
			'name' => 'userPpc',
			'email' => 'ppc@gmail.com',
			'password' => bcrypt('123123123')
		]);

		$userPpc->assignRole('PPC');

		$userMasterSpec = User::create([
			'name' => 'userMasterSpec',
			'email' => 'spec@gmail.com',
			'password' => bcrypt('123123123')
		])->assignRole('MASTER_SPEC');
    }
}

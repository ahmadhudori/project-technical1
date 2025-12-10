<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
			'name' => 'PPC',
			'guard_name' => 'web'
		]);
		Role::create([
			'name' => 'MASTER_SPEC',
			'guard_name' => 'web'
		]);
    }
}

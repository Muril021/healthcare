<?php

namespace Database\Seeders;

use App\Models\Role;
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
        $roleAdmin = Role::where('name', 'admin')->first();
        $rolePatient = Role::where('name', 'patient')->first();

        $userAdmin = User::create([
            'name' => 'Admin',
            'email' => 'admin@email.com',
            'password' => bcrypt('password'),
        ]);

        $roleAdmin && $userAdmin->roles()->attach($roleAdmin);

        $userPatient = User::create([
            'name' => 'Patient',
            'email' => 'patient@email.com',
            'password' => bcrypt('password'),
        ]);

        $rolePatient && $userPatient->roles()->attach($rolePatient);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{

    public function run(): void
    {

        $adminRole = Role::where('name', 'admin')->first();
        $userRole = Role::where('name', 'user')->first();


        if ($adminRole && $userRole) {
            $adminUser = User::firstOrCreate(
                ['email' => 'admin@library.com'],

                [
                    'name' => 'Admin User',
                    'password' => Hash::make('password'),

                ]
            );


            $adminUser->roles()->sync([$adminRole->id, $userRole->id]);
        }
    }
}

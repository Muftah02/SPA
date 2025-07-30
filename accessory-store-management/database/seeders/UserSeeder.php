<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'مدير النظام',
            'email' => 'admin@store.local',
            'phone' => '0500000000',
            'role' => 'admin',
            'is_active' => true,
            'password' => Hash::make('123456'),
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'موظف المبيعات',
            'email' => 'employee@store.local',
            'phone' => '0500000001',
            'role' => 'employee',
            'is_active' => true,
            'password' => Hash::make('123456'),
            'email_verified_at' => now(),
        ]);
    }
}

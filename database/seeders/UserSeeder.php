<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::updateOrCreate([
            'name' => "Administrator",
        ], [
            'email' => "admin@admin.com",
            'password' => Hash::make("12345678"),
            'email_verified_at' => now(),
        ]);
        $admin->assignRole('Admin');

        $member = User::updateOrCreate([
            'name' => "Worker 1",
        ], [
            'email' => "worker1@worker.com",
            'password' => Hash::make("12345678"),
            'email_verified_at' => now(),
        ]);
        $member->assignRole('Member');
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin123'), 
            'role' => 'admin', 
        ]);
        
        $this->command->info('Admin user created successfully!');
        $this->command->warn('Email: admin@example.com');
        $this->command->warn('Password: admin123');
    }
}
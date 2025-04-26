<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Client;
use App\Models\HealthProgram;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'System Admin',
            'email' => 'admin@healthsystem.com',
            'password' => Hash::make('admin1234'), 
            'role' => 'admin',
        ]);

        // Create sample health programs
        $programs = [
            ['name' => 'HIV Care', 'description' => 'HIV treatment and prevention program'],
            ['name' => 'Malaria Control', 'description' => 'Malaria testing and treatment'],
            ['name' => 'TB Program', 'description' => 'Tuberculosis detection and treatment'],
            ['name' => 'Maternal Health', 'description' => 'Prenatal and postnatal care']
        ];

        foreach ($programs as $program) {
            HealthProgram::create($program);
        }

        // Create sample clients (10 clients)
        Client::factory(10)->create()->each(function ($client) {
            $programs = HealthProgram::inRandomOrder()
                ->limit(rand(1, 3))
                ->pluck('id')
                ->toArray();
            
            $client->healthPrograms()->attach($programs, [
                'enrollment_date' => now()->subDays(rand(1, 365))
            ]);
        });

        $this->command->info('✅ Database seeded successfully!');
        $this->command->line('👤 Admin login: admin@healthsystem.com / SecurePassword123!');
    }
}
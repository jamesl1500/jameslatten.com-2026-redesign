<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin user
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@jameslatten.com',
            'password' => bcrypt('password'), // Change this in production!
            'is_admin' => true,
        ]);
        
        echo "Admin user created successfully!\n";
        echo "Email: admin@jameslatten.com\n";
        echo "Password: password\n\n";
        echo "⚠️  Please change the admin password after logging in!\n";
    }
}

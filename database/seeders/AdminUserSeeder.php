<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminEmail = config('auth.admin_email', 'a.azim0711@gmail.com');
        
        // Check if admin user already exists
        if (!User::where('email', $adminEmail)->exists()) {
            User::create([
                'name' => 'Admin User',
                'email' => $adminEmail,
                'password' => Hash::make('admin123'), // Change this password!
                'email_verified_at' => now(),
            ]);
            
            $this->command->info("Admin user created with email: {$adminEmail}");
            $this->command->warn("Default password is 'admin123' - Please change it immediately!");
        } else {
            $this->command->info("Admin user already exists with email: {$adminEmail}");
        }
    }
} 
<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class ResetAdminPassword extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:reset-password {--email= : Admin email address} {--password= : New password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset admin user password';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = $this->option('email') ?: $this->ask('Enter admin email address', 'a.azim0711@gmail.com');
        $password = $this->option('password') ?: $this->secret('Enter new password');

        // Find the user
        $user = User::where('email', $email)->first();

        if (!$user) {
            $this->error("User with email {$email} not found!");
            return 1;
        }

        // Update the password
        $user->update([
            'password' => Hash::make($password),
        ]);

        $this->info("Password updated successfully for {$email}!");
        $this->info("You can now login at: " . url('/admin'));

        return 0;
    }
} 
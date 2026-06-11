<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CreateAdminUser extends Command
{
    protected $signature = 'admin:create
                            {--email= : Admin email address}
                            {--name= : Admin name}';

    protected $description = 'Create or update the admin user';

    public function handle(): int
    {
        $this->info('── Admin User Setup ──');

        $name = $this->option('name')
            ?? $this->ask('Name', 'Admin');

        $email = $this->option('email')
            ?? $this->ask('Email', 'admin@occultscience.in');

        if (Validator::make(['email' => $email], ['email' => 'required|email'])->fails()) {
            $this->error('Invalid email address.');
            return self::FAILURE;
        }

        $password = $this->secret('Password (min 8 characters)');

        if (strlen($password) < 8) {
            $this->error('Password must be at least 8 characters.');
            return self::FAILURE;
        }

        $confirm = $this->secret('Confirm password');

        if ($password !== $confirm) {
            $this->error('Passwords do not match.');
            return self::FAILURE;
        }

        $exists = User::where('email', $email)->exists();

        User::updateOrCreate(
            ['email' => $email],
            [
                'name'     => $name,
                'password' => Hash::make($password),
                'is_admin' => true,
            ]
        );

        $this->newLine();
        $this->info($exists ? "Admin user updated: {$email}" : "Admin user created: {$email}");

        return self::SUCCESS;
    }
}

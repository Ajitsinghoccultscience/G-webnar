<?php

namespace Database\Seeders;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // Admin user
        User::updateOrCreate(
            ['email' => 'admin@occultscience.in'],
            [
                'name'     => 'Admin',
                'password' => Hash::make('Admin@1234'),
                'is_admin' => true,
            ]
        );

        // Default webinar settings
        Setting::set('webinar_date', 'Wed, 17 June, 2026');
        Setting::set('whatsapp_link', 'https://chat.whatsapp.com/Bgz3Vhf7xAZDW4gO3xVlCr');
    }
}

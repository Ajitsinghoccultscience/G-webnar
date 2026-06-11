<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // Default webinar settings (safe to re-run — won't overwrite existing values)
        Setting::set('webinar_date', 'Wed, 17 June, 2026');
        Setting::set('whatsapp_link', 'https://chat.whatsapp.com/Bgz3Vhf7xAZDW4gO3xVlCr');

        $this->command->info('Run php artisan admin:create to set up the admin user.');
    }
}

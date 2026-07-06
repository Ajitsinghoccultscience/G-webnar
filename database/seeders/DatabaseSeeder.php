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
        Setting::set('webinar_date', 'Saturday, 11th July, 2026');
        Setting::set('webinar_time', '7:00 PM - 9:00 PM');
        Setting::set('whatsapp_link', 'https://chat.whatsapp.com/Bgz3Vhf7xAZDW4gO3xVlCr');

        $this->command->info('Run php artisan admin:create to set up the admin user.');
    }
}

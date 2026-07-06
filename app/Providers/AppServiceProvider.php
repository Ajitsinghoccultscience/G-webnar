<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer(['sections.hero-section', 'checkout', 'thankyou'], function ($view) {
            try {
                $view->with([
                    'webinarDate'  => Setting::get('webinar_date', 'Saturday, 11th July, 2026'),
                    'webinarTime'  => Setting::get('webinar_time', '7:00 PM - 9:00 PM'),
                    'whatsappLink' => Setting::get('whatsapp_link', 'https://chat.whatsapp.com/Bgz3Vhf7xAZDW4gO3xVlCr'),
                ]);
            } catch (\Exception $e) {
                // DB not ready yet (e.g. during migrations)
            }
        });
    }
}

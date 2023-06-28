<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::directive('money', function ($money) {
            return "<?php echo number_format($money, 2); ?>";
        });
        $this->mapBladeComponents();
    }

    /**
     * Map blade components.
     */
    public function mapBladeComponents(): void
    {
        Blade::componentNamespace('App\View\Components\Client', 'client');
        Blade::componentNamespace('App\View\Components\Admin', 'admin');
    }
}
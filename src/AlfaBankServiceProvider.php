<?php
namespace Dosarkz\EPayAlfaBank;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class AlfaBankServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../Config/alfabank.php' => config_path('alfabank.php'),
        ]);

        $this->mergeConfigFrom(
            __DIR__ . '/../Config/alfabank.php', 'alfabank'
        );
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app['alfabank'] = $this->app->share(function($app)
        {
            return new AlfaBankRepository();
        });

    }
}

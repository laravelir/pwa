<?php

namespace Laravelir\Pwa\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Laravelir\Pwa\Console\Commands\InstallPackageCommand;
use Laravelir\Pwa\Console\Commands\PwaGenerateCommand;
use Laravelir\Pwa\Facades\Pwa;

class PwaServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . "/../../config/pwa.php", 'pwa');

        $this->registerFacades();
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        $this->registerCommands();

        // $this->publishStubs();
        // $this->registerLivewireComponents();
    }

    private function registerFacades()
    {
        $this->app->bind('package', function ($app) {
            return new Pwa();
        });
    }

    private function registerCommands()
    {
        if ($this->app->runningInConsole()) {

            $this->commands([
                InstallPackageCommand::class,
                PwaGenerateCommand::class,
            ]);
        }
    }

    public function publishConfig()
    {
        $this->publishes([
            __DIR__ . '/../../config/pwa.php' => config_path('pwa.php')
        ], 'pwa-config');
    }

    // private function publishStubs()
    // {
    //     $this->publishes([
    //         __DIR__ . '/../Console/Stubs' => resource_path('vendor/laravelir/package/stubs'),
    //     ], 'package-stubs');
    // }

     protected function registerBladeDirectives()
     {
         $src = "";
         Blade::directive('pwa-scripts', function ($expression) use ($src) {
             return "<?php echo $src ?/>";
         });

     }

}

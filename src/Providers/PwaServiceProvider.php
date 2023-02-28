<?php

namespace Laravelir\Pwa\Providers;

use Illuminate\Support\ServiceProvider;
use Laravelir\Pwa\Console\Commands\InstallPackageCommand;
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

    // protected function registerBladeDirectives()
    // {
    //     Blade::directive('format', function ($expression) {
    // return "<?php echo ($expression)->format('m/d/Y H:i') ?/>";
    //     });

    //     Blade::directive('config', function ($key) {
    //         return "<?php echo config('package.' . $key); ?/>";
    //     });
    // }

    // protected function registerMiddleware(Kernel $kernel, Router $router)
    // {
    //     // global
    //     $kernel->pushMiddleware(CapitalizeTitle::class);

    //     // route middleware
    //     // $router = $this->app->make(Router::class);
    //     $router->aliasMiddleware('capitalize', CapitalizeTitle::class);

    //     // group
    //     $router->pushMiddlewareToGroup('web', CapitalizeTitle::class);
    // }

    // public function registerLivewireComponents()
    // {
    // Livewire::component('test', Test::class);
    // }
}

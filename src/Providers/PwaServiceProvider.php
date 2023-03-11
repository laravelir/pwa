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

    public function boot()
    {
        $this->registerCommands();
        $this->publishStubs();
    }

    private function registerFacades()
    {
        $this->app->bind('pwa', function ($app) {
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

    private function publishStubs()
    {
        $this->publishes([
            __DIR__ . '/../Console/Stubs' => resource_path('vendor/laravelir/pwa/stubs'),
        ], 'pwa-stubs');
    }

    protected function registerBladeDirectives()
    {
/*        return "<?php \$config = (new \LaravelPWA\Services\ManifestService)->generate(); echo \$__env->make( 'laravelpwa::meta' , ['config' => \$config])->render(); ?>";*/

        $src = "";
        Blade::directive('pwa_metas', function ($expression) use ($src) {
            return "<?php echo $src ?/>";
        });

        Blade::directive('pwa_sw', function ($expression) use ($src) {
            return "<?php echo $src ?/>";
        });
    }

}

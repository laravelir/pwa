<?php

namespace Laravelir\Pwa\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class InstallPackageCommand extends Command
{
    protected $signature = 'pwa:install';

    protected $description = 'Install the pwa Package';

    public function handle()
    {
        $this->line("\t... Welcome To Package Installer ...");

        //config
        if (File::exists(config_path('pwa.php'))) {
            $confirm = $this->confirm("pwa.php already exist. Do you want to overwrite?");
            if ($confirm) {
                $this->publishConfig();
                $this->info("config overwrite finished");
            } else {
                $this->info("skipped config publish");
            }
        } else {
            $this->publishConfig();
            $this->info("config published");
        }

        $this->info("Package Successfully Installed.\n");
        $this->info("\t\tGood Luck.");
    }

    private function publishConfig()
    {
        $this->call('vendor:publish', [
            '--provider' => "Laravelir\\Pwa\\Providers\\PwaServiceProvider",
            '--tag'      => 'pwa-config',
            '--force'    => true
        ]);
    }

}

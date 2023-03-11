<?php

namespace Laravelir\Pwa\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Laravelir\Pwa\Services\ManifestGenerator;

class PwaGenerateCommand extends Command
{
    protected $signature = 'pwa:generate';

    protected $description = 'generate pwa files';

    public function handle()
    {
        $this->line("\t... Welcome To Pwa Installer ...");

        $manifest = resolve(ManifestGenerator::class)->generate();

        File::put(public_path("manifest.json"), json_encode($manifest, JSON_PRETTY_PRINT));

        $this->line('manifest.json file has been created.');

        $this->info("Package Successfully Installed.\n");
        $this->info("\t\tGood Luck.");
    }

    //       //config
    //       if (File::exists(config_path('pwa.php'))) {
    //         $confirm = $this->confirm("pwa.php already exist. Do you want to overwrite?");
    //         if ($confirm) {
    //             $this->publishConfig();
    //             $this->info("config overwrite finished");
    //         } else {
    //             $this->info("skipped config publish");
    //         }
    //     } else {
    //         $this->publishConfig();
    //         $this->info("config published");
    //     }


}

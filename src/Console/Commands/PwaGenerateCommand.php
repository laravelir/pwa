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

        $manifest = resolve(ManifestGenerator::class)->generate();

        if (File::exists(public_path('manifest.json'))) {
            $confirm = $this->confirm('manifest.json exists! do you want overwrite it?');
            if ($confirm) {
                File::delete(public_path('manifest.json'));
                $this->createManifestFile($manifest);
                $this->line('manifest.json file has been overwrite.');
            } else {
                $this->line('you must overwrite it; try again.');
                die;
            }
        } else {
            $this->createManifestFile($manifest);
            $this->line('manifest.json file has been created.');
        }

    }


    private function createManifestFile($manifest)
    {
        File::put(public_path("manifest.json"), json_encode($manifest, JSON_PRETTY_PRINT));
    }

}

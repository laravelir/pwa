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
        $sw = file_get_contents('');

        $manifest = resolve(ManifestGenerator::class)->generate();

        if (File::exists(public_path('manifest.json'))) {
            $confirm = $this->confirm('manifest.json exists! do you want overwrite it?');
            if ($confirm) {
                File::delete(public_path('manifest.json'));
                File::put(public_path("manifest.json"), json_encode($manifest, JSON_PRETTY_PRINT));
            } else {
                $this->line('you must overwrite it; try again.');
                die;
            }
        }




        $this->line('manifest.json file has been created.');
    }
}

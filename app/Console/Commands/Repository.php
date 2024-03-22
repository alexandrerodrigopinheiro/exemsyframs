<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;

class Repository extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repository {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new repository file';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        $filesystem = new Filesystem;

        $stubContent = $filesystem->get(base_path('vendor/laravel/framework/src/Illuminate/Foundation/Console/stubs/repository.stub'));

        $contents = str_replace(
            ['{{ namespace }}', '{{ name }}', '{{ class }}'],
            ['App\\Repositories', ucwords(strtolower($this->getClassBasename($name))), ucwords(strtolower($this->getClassBasename($name))).'Repository'],
            $stubContent
        );

        $filesystem->put(app_path('Repositories/'.$name.'Repository.php'), $contents);

        $this->info('Repository file created successfully!');
    }

    protected function getNamespace($name)
    {
        return trim(implode('\\', array_slice(explode('\\', $name), 0, -1)), '\\');
    }

    protected function getClassBasename($name)
    {
        return Str::snake(implode('', array_slice(explode('\\', $name), -1)));
    }
}

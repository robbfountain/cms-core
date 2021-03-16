<?php

namespace Onethirtyone\Core\Commands;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

class CoreInstall extends \Illuminate\Console\Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cms:core-install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Installs the core components of the CMS';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->comment('Installing Core Dependencies...');
        static::install();
        $this->comment("Installation Complete.  Please run npm install && npm run dev");
        return 0;
    }

    /**
     *  Installs the One Thirty One Studios Preset
     */
    public static function install()
    {

        static::installBreeze();
//        static::cleanSassDirectory();
//        static::updatePackages();
//        static::updateComposer();
//        static::updateMix();
//        static::updateJs();
        static::migrateDatabase();
    }

    public static function migrateDatabase()
    {
        Artisan::call('migrate:fresh');
    }

    public static function installBreeze()
    {
        Artisan::call('breeze:install');
    }


    /**
     * @param $packages
     *
     * @return array
     */
    public static function updateComposerArray($packages)
    {
        return array_merge([

        ], Arr::except($packages, [
            //
        ]));

    }

    /**
     * @param $repositories
     *
     * @return array
     */
    public static function updateRepositoriesArray($repositories)
    {
        return array_merge([

        ], Arr::except($repositories, [
            //
        ]));
    }

    /**
     *  Updates laravel mix scaffolding
     */
    public static function updateMix()
    {
        copy(__DIR__ . '/../../stubs/webpack.mix.js', base_path('webpack.mix.js'));
        copy(__DIR__ . '/../../stubs/app.css', resource_path('css/app.css'));
    }

    /**
     *  Updates core JS files
     */
    public static function updateJs()
    {
        copy(__DIR__ . '/../../stubs/tailwind.config.js', base_path('tailwind.config.js'));
        copy(__DIR__ . '/../../stubs/app.js', resource_path('js/app.js'));
        copy(__DIR__ . '/../../stubs/bootstrap.js', resource_path('js/bootstrap.js'));
    }

    /**
     * Update the "composer.json" file.
     *
     * @return void
     */
    public static function updatePackages()
    {
        if (!file_exists(base_path('package.json'))) {
            return;
        }

        $packages = json_decode(file_get_contents(base_path('package.json')), true);

        $packages['dependencies'] = static::updatePackageArray(
            $packages['dependencies'] ?? []
        );

        ksort($packages['dependencies']);

        file_put_contents(
            base_path('package.json'),
            json_encode($packages, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . PHP_EOL
        );
    }

    /**
     * @param $packages
     *
     * @return array
     */
    public static function updatePackageArray($packages)
    {
        return array_merge([
            'tailwindcss' => '2.0',
            "alpinejs" => "^2.8.1",
            "@tailwindcss/forms" => "^0.2.1"
        ], $packages);
    }

    /**
     *  Cleans Sass Directory
     */
    public static function cleanSassDirectory()
    {
        File::cleanDirectory(resource_path('css'));
        File::cleanDirectory(resource_path('js'));
    }
}

<?php

/**
 * Created By sadaimudiNaadhar
 * @author https://github.com/sadaimudiNaadhar
 *
 */

namespace Sadaimudinaadhar\Tinyurl\Providers;

use Illuminate\Support\ServiceProvider;
use Sadaimudinaadhar\Tinyurl\Facades\TinyUrl;
use Sadaimudinaadhar\Tinyurl\TinyUrls;

class TinyUrlServiceProvider extends ServiceProvider {
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        
        $this->publishes([__DIR__ . '/../../config/tinyurls.php' => config_path('tinyurls.php') ], 'tinyurlconfig');

        $this->publishes([__DIR__ . '/../database/migrations/' => database_path('migrations') ], 'tinyurlmigration');

        $this->app->bind('tinyurl', TinyUrls::class); // For Facades
        $this->loadRoutesFrom(__DIR__ . '/../../routes/tinyurlroutes.php');
        $this->loadMigrationsFrom(__DIR__ . '/../../migrations/2018_12_23_093459_create_tiny_urls_table.php');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //
        

        
    }
}


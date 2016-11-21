<?php

namespace LukasGreed\posts;

use Illuminate\Support\ServiceProvider;

class PostsServiceProvider extends ServiceProvider {

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot() {
        $this->loadViewsFrom(__DIR__ . '/app/Views', 'posts');
        
        //$this->loadMigrationsFrom(__DIR__.'/migrations');
        
        $this->publishes([
            __DIR__ . '/migrations' => $this->app->databasePath() . '/migrations',
            __DIR__ . '/app/Views' => base_path('resources/views/LukasGreed/posts'),            
            __DIR__ . '/app/Controllers' => base_path('app/Http/Controllers'),
            __DIR__ . '/app/Models' => base_path('app/Models'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register() {
        include __DIR__ . '/app/routes.php';
        $this->app->make('LukasGreed\posts\app\Controllers\PostsController');
    }

}

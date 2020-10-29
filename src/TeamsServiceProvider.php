<?php

namespace Lockminds\Teams;

use Illuminate\Support\ServiceProvider;
use Lockminds\Teams\Console\InstallLockmindsTeams;
use Lockminds\Teams\Console\InstallMinimalLockmindsTeams;
use Lockminds\Teams\Console\UpdateLockmindsTeams;
use Lockminds\Teams\Providers\SeedServiceProvider;
use Spatie\Permission\PermissionServiceProvider;

class TeamsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
         $this->loadTranslationsFrom(__DIR__.'/Resources/lang', 'teams');
         $this->loadViewsFrom(__DIR__.'/Resources/views', 'teams');
         $this->loadMigrationsFrom(__DIR__.'/Database/Migrations');
         $this->loadRoutesFrom(__DIR__.'/Routes/routes.php');

        if ($this->app->runningInConsole()) {

            $this->publishes([
                __DIR__.'/../config/lm_team_config.php' => config_path('lm_team_config.php'),
                __DIR__.'/../config/lm_team_menu_aside.php' => config_path('lm_team_menu_aside.php'),
                __DIR__.'/../config/lm_team_layouts.php' => config_path('lm_team_layouts.php'),
                __DIR__.'/../config/lm_team_menu_header.php' => config_path('lm_team_menu_header.php'),
            ], 'lockminds-config');

            // Publishing the views.
            $this->publishes([
                __DIR__.'/Resources/views' => resource_path('views/vendor/teams'),
            ], 'lockminds-views');

            // Publishing assets.
            $this->publishes([
                __DIR__.'/Resources/assets' => public_path('vendor/teams'),
            ], 'lockminds-assets');

            // Publishing the translation files.
            $this->publishes([
                __DIR__.'/Resources/lang' => resource_path('lang/vendor/teams'),
            ], 'lockminds-lang');

            // Publishing seeders
            $this->publishes([
                __DIR__ . '/Database/Seeders/PermissionsSeeder.php' => database_path('seeders/PermissionsSeeder.php'),
            ], 'lockminds-seeds');

            // Publish your migrations
            $this->publishes([
                __DIR__.'/Database/Migrations/2020_09_15_095958_teams_tables.php' => database_path('/migrations/2020_09_15_095958_teams_tables.php'),
                __DIR__.'/Database/Migrations/2020_09_24_160637_create_permission_tables.php' => database_path('/migrations/2020_09_24_160637_create_permission_tables.php')
            ], 'lockminds-migrations');

            // Registering package commands.
            $this->commands([
                InstallLockmindsTeams::class,
                InstallMinimalLockmindsTeams::class,
                UpdateLockmindsTeams::class
            ]);

        }

    }

    /**
     * Register the application services.
     */
    public function register()
    {

        $this->app->register(PermissionServiceProvider::class);
        $this->app->register(\Kreait\Laravel\Firebase\ServiceProvider::class);
        $this->app->register(SeedServiceProvider::class);

        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/lm_team_config.php', 'teams');
        $this->mergeConfigFrom(__DIR__.'/../config/lm_team_menu_header.php', 'teams');
        $this->mergeConfigFrom(__DIR__.'/../config/lm_team_menu_aside.php', 'teams');
        $this->mergeConfigFrom(__DIR__.'/../config/lm_team_layouts.php', 'teams');
        $this->mergeConfigFrom(__DIR__.'/../config/permission.php', 'teams');

        // Register the main class to use with the facade
        $this->app->singleton('teams', function () {
            return new Teams;
        });


    }
}

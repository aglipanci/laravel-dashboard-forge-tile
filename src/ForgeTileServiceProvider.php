<?php

namespace aglipanci\ForgeTile;

use aglipanci\ForgeTile\Commands\FetchForgeRecentEventsCommand;
use aglipanci\ForgeTile\Commands\FetchForgeServersCommand;
use aglipanci\ForgeTile\Components\ForgeRecentEventsComponent;
use aglipanci\ForgeTile\Components\ForgeServersComponent;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Laravel\Forge\Forge;

class ForgeTileServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                FetchForgeServersCommand::class,
                FetchForgeRecentEventsCommand::class,
            ]);
        }

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/dashboard-forge-tile'),
        ], 'dashboard-forge-tile-views');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'dashboard-forge-tile');

        Livewire::component('forge-server-tile', ForgeServersComponent::class);
        Livewire::component('forge-recent-events-tile', ForgeRecentEventsComponent::class);
    }

    public function register()
    {
        $this->app->singleton(Forge::class, function () {
            return new Forge(config('dashboard.tiles.forge.token'));
        });
    }

}

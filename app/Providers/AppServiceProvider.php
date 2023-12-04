<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Filament\Navigation\NavigationGroup;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Filament::serving(function () {
            Filament::registerNavigationGroups([
                NavigationGroup::make()
                    ->label('Ahli Kariah'),                
                NavigationGroup::make()
                    ->label('Kariah'),                
                NavigationGroup::make()
                    ->label('Khairat')
                    ->icon('heroicon-o-banknotes'),              
                NavigationGroup::make()
                    ->label('Geo Lokasi')
                    ->collapsed(),
            ]);
        });
    }
}

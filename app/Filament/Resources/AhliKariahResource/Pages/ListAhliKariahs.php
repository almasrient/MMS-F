<?php

namespace App\Filament\Resources\AhliKariahResource\Pages;

use App\Filament\Resources\AhliKariahResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAhliKariahs extends ListRecords
{
    protected static ?string $title = 'Ahli Kariah';

    protected static string $resource = AhliKariahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

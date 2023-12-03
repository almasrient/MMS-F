<?php

namespace App\Filament\Resources\KariahResource\Pages;

use App\Filament\Resources\KariahResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKariahs extends ListRecords
{
    protected static ?string $title = 'Kariah';

    protected static string $resource = KariahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

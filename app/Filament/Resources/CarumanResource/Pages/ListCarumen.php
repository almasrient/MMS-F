<?php

namespace App\Filament\Resources\CarumanResource\Pages;

use App\Filament\Resources\CarumanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCarumen extends ListRecords
{
    protected static string $resource = CarumanResource::class;

    protected static ?string $title = 'Yuran Caruman';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

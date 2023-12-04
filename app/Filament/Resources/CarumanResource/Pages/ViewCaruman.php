<?php

namespace App\Filament\Resources\CarumanResource\Pages;

use App\Filament\Resources\CarumanResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewCaruman extends ViewRecord
{
    protected static string $resource = CarumanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}

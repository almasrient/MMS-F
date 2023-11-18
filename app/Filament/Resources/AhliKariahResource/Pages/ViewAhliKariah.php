<?php

namespace App\Filament\Resources\AhliKariahResource\Pages;

use App\Filament\Resources\AhliKariahResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewAhliKariah extends ViewRecord
{
    protected static string $resource = AhliKariahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}

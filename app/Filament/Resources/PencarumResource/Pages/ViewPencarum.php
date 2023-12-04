<?php

namespace App\Filament\Resources\PencarumResource\Pages;

use App\Filament\Resources\PencarumResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPencarum extends ViewRecord
{
    protected static string $resource = PencarumResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}

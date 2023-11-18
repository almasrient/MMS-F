<?php

namespace App\Filament\Resources\BandarResource\Pages;

use App\Filament\Resources\BandarResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewBandar extends ViewRecord
{
    protected static string $resource = BandarResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}

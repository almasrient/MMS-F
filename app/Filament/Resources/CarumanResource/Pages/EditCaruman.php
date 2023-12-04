<?php

namespace App\Filament\Resources\CarumanResource\Pages;

use App\Filament\Resources\CarumanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCaruman extends EditRecord
{
    protected static string $resource = CarumanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}

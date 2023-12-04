<?php

namespace App\Filament\Resources\PencarumResource\Pages;

use App\Filament\Resources\PencarumResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPencarum extends EditRecord
{
    protected static string $resource = PencarumResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}

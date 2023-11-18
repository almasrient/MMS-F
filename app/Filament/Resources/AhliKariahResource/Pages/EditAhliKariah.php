<?php

namespace App\Filament\Resources\AhliKariahResource\Pages;

use App\Filament\Resources\AhliKariahResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAhliKariah extends EditRecord
{
    protected static string $resource = AhliKariahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\KariahResource\Pages;

use App\Filament\Resources\KariahResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKariah extends EditRecord
{
    protected static string $resource = KariahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

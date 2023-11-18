<?php

namespace App\Filament\Resources\BandarResource\Pages;

use App\Filament\Resources\BandarResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBandar extends EditRecord
{
    protected static string $resource = BandarResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}

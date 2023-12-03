<?php

namespace App\Filament\Resources\OrgaKariahResource\Pages;

use App\Filament\Resources\OrgaKariahResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOrgaKariah extends EditRecord
{
    protected static string $resource = OrgaKariahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}

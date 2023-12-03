<?php

namespace App\Filament\Resources\OrgaKariahResource\Pages;

use App\Filament\Resources\OrgaKariahResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewOrgaKariah extends ViewRecord
{
    protected static string $resource = OrgaKariahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}

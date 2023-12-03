<?php

namespace App\Filament\Resources\OrgaKariahResource\Pages;

use App\Filament\Resources\OrgaKariahResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOrgaKariahs extends ListRecords
{
    protected static string $resource = OrgaKariahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

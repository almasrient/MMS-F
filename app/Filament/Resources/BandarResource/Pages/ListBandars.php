<?php

namespace App\Filament\Resources\BandarResource\Pages;

use App\Filament\Resources\BandarResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBandars extends ListRecords
{
    protected static ?string $title = 'Bandar';

    protected static string $resource = BandarResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

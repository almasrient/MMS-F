<?php

namespace App\Filament\Resources\PencarumResource\Pages;

use App\Filament\Resources\PencarumResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPencarums extends ListRecords
{
    protected static string $resource = PencarumResource::class;

    protected static ?string $title = 'Pencarum';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

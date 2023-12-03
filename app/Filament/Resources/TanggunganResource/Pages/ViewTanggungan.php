<?php

namespace App\Filament\Resources\TanggunganResource\Pages;

use App\Filament\Resources\TanggunganResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewTanggungan extends ViewRecord
{
    protected static string $resource = TanggunganResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}

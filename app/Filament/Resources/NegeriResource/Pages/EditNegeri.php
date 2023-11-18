<?php

namespace App\Filament\Resources\NegeriResource\Pages;

use App\Filament\Resources\NegeriResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditNegeri extends EditRecord
{
    protected static string $resource = NegeriResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

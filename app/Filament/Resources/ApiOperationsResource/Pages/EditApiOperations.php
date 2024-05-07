<?php

namespace App\Filament\Resources\ApiOperationsResource\Pages;

use App\Filament\Resources\ApiOperationsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditApiOperations extends EditRecord
{
    protected static string $resource = ApiOperationsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\ApprovedCardResource\Pages;

use App\Filament\Resources\ApprovedCardResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditApprovedCard extends EditRecord
{
    protected static string $resource = ApprovedCardResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

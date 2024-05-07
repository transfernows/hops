<?php

namespace App\Filament\Resources\ApprovedCardResource\Pages;

use App\Filament\Resources\ApprovedCardResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListApprovedCards extends ListRecords
{
    protected static string $resource = ApprovedCardResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

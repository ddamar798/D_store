<?php

namespace App\Filament\Resources\ProductTransactionResource\Pages;

use App\Filament\Resources\ProducTransactionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProducTransaction extends EditRecord
{
    protected static string $resource = ProducTransactionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

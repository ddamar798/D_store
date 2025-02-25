<?php

namespace App\Filament\Resources\ShoeResource\Pages;

use App\Filament\Resources\ShoeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListShoes extends ListRecords
{
    protected static string $resource = ShoeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

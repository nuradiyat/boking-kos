<?php

namespace App\Filament\Resources\BoaringHouseResource\Pages;

use App\Filament\Resources\BoaringHouseResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBoaringHouses extends ListRecords
{
    protected static string $resource = BoaringHouseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\Category.phpResource\Pages;

use App\Filament\Resources\Category.phpResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCategory.phps extends ListRecords
{
    protected static string $resource = Category.phpResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

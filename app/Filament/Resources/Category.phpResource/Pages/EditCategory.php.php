<?php

namespace App\Filament\Resources\Category.phpResource\Pages;

use App\Filament\Resources\Category.phpResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCategory.php extends EditRecord
{
    protected static string $resource = Category.phpResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

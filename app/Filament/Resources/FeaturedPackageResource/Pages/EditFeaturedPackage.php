<?php

namespace App\Filament\Resources\FeaturedPackageResource\Pages;

use App\Filament\Resources\FeaturedPackageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFeaturedPackage extends EditRecord
{
    protected static string $resource = FeaturedPackageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\FeaturedPackageResource\Pages;

use App\Filament\Resources\FeaturedPackageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFeaturedPackages extends ListRecords
{
    protected static string $resource = FeaturedPackageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

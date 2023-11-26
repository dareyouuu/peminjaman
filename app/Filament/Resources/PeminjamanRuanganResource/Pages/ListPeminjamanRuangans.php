<?php

namespace App\Filament\Resources\PeminjamanRuanganResource\Pages;

use App\Filament\Resources\PeminjamanRuanganResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPeminjamanRuangans extends ListRecords
{
    protected static string $resource = PeminjamanRuanganResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

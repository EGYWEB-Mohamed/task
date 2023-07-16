<?php

namespace App\Filament\Resources\ClientResource\Pages;

use App\Filament\Resources\ClientResource;
use Filament\Pages\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Konnco\FilamentImport\Actions\ImportAction;
use Konnco\FilamentImport\Actions\ImportField;

class ListClients extends ListRecords
{
    protected static string $resource = ClientResource::class;

    protected function getActions(): array
    {
        return [
            ImportAction::make()
                        ->fields([
                            ImportField::make('name')->required()
                                       ->label('Client Name'),
                            ImportField::make('phone')->required()
                                       ->label('Client Phone'),
                            ImportField::make('email')->required()
                                       ->label('Client Email'),
                        ]),
            CreateAction::make(),
        ];
    }
}

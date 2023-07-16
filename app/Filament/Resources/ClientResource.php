<?php

namespace App\Filament\Resources;

use App\Client;
use App\Filament\Resources\ClientResource\Pages;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;

class ClientResource extends Resource
{
    protected static ?string $model = Client::class;

    protected static ?string $slug = 'clients';

    protected static ?string $recordTitleAttribute = 'name';
    protected static function getNavigationLabel(): string
    {
        return 'Task 1';
    }
    public static function form(Form $form): Form
    {
        return $form->schema([
                TextInput::make('name')
                         ->required(),

                TextInput::make('phone')
                         ->required(),

                TextInput::make('email')
                         ->required(),

                Placeholder::make('created_at')
                           ->label('Created Date')
                           ->content(fn(?Client $record): string => $record?->created_at?->diffForHumans() ?? '-'),

                Placeholder::make('updated_at')
                           ->label('Last Modified Date')
                           ->content(fn(?Client $record): string => $record?->updated_at?->diffForHumans() ?? '-'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
                TextColumn::make('name')
                          ->searchable()
                          ->sortable(),

                TextColumn::make('phone'),

                TextColumn::make('email')
                          ->searchable()
                          ->sortable()
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListClients::route('/'),
            'create' => Pages\CreateClient::route('/create'),
            'edit'   => Pages\EditClient::route('/{record}/edit'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['name','email'];
    }
}

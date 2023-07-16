<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Models\Order;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables\Columns\TextColumn;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $slug = 'orders';

    protected static ?string $recordTitleAttribute = 'id';
    protected static ?string $navigationGroup = 'Task 2';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Card::make()
                ->schema([
                    Select::make('user_id')
                          ->relationship('user','name')
                          ->required(),

                    TextInput::make('total_cost')
                             ->required(),

                    Select::make('status')
                          ->options([
                              'new',
                              'confirm',
                              'shipped',
                              'process',
                              'delivery',
                              'returnInProgress',
                              'return',
                              'cancel'
                          ])
                          ->searchable()
                          ->required(),
                ])
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('user.name'),

            TextColumn::make('total_cost')->money('SAR',true),

            TextColumn::make('status'),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit'   => Pages\EditOrder::route('/{record}/edit'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return [];
    }

    protected static function getNavigationLabel(): string
    {
        return 'Orders';
    }
}

<?php

namespace App\Filament\Resources\Addresses;

use App\Filament\Resources\Addresses\Pages\CreateAddresses;
use App\Filament\Resources\Addresses\Pages\EditAddresses;
use App\Filament\Resources\Addresses\Pages\ListAddresses;
use App\Filament\Resources\Addresses\Schemas\AddressesForm;
use App\Filament\Resources\Addresses\Tables\AddressesTable;
use App\Models\Addresses;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AddressesResource extends Resource
{
    protected static ?string $model = Addresses::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::MapPin;

    protected static ?string $recordTitleAttribute = 'Address';

    public static function form(Schema $schema): Schema
    {
        return AddressesForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AddressesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListAddresses::route('/'),
            'create' => CreateAddresses::route('/create'),
            'edit' => EditAddresses::route('/{record}/edit'),
        ];
    }
}

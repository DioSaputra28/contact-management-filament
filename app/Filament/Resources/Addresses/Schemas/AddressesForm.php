<?php

namespace App\Filament\Resources\Addresses\Schemas;

use App\Models\Contacts;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class AddressesForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('street')
                    ->required(),
                TextInput::make('city')
                    ->required(),
                TextInput::make('province')
                    ->required(),
                TextInput::make('country')
                    ->required(),
                TextInput::make('postal_code')
                    ->required(),
                Select::make('contact_id')
                    ->label('Contact Name')
                    ->options(
                        Contacts::query()
                            ->where('user_id', auth()->id())
                            ->pluck('first_name', 'contact_id')
                    )
                    ->searchable()
                    ->preload()
                    ->required(),
            ]);
    }
}

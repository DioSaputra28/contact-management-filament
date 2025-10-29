<?php

namespace App\Filament\Resources\Contacts\Pages;

use App\Filament\Resources\Addresses\Tables\AddressesTable;
use App\Filament\Resources\Contacts\ContactsResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
use Filament\Tables\Table;

class ViewContact extends ViewRecord
{
    protected static string $resource = ContactsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }

}

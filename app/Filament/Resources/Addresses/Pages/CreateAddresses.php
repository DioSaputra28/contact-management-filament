<?php

namespace App\Filament\Resources\Addresses\Pages;

use App\Filament\Resources\Addresses\AddressesResource;
use Filament\Resources\Pages\CreateRecord;

class CreateAddresses extends CreateRecord
{
    protected static string $resource = AddressesResource::class;
    protected function beforeFill(): void {}

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}

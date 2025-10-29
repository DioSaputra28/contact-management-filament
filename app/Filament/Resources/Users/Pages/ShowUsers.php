<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\Schemas\UserForm;
use App\Filament\Resources\Users\UserResource;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Resources\Pages\Concerns\InteractsWithRecord;
use Filament\Resources\Pages\Page;
use Filament\Schemas\Components\Form;
use Filament\Schemas\Schema;

class ShowUsers extends Page
{
    use InteractsWithRecord;
    use InteractsWithForms;


    protected static string $resource = UserResource::class;

    protected string $view = 'filament.resources.users.pages.show-users';



    public function mount(int|string $record): void
    {
        $this->record = $this->resolveRecord($record);

        $this->form->fill(
            $this->record->only(['name', 'email', 'created_at'])
        );
    }

    public array $data = [];

    public function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                TextInput::make('name')->disabled(),
                TextInput::make('email')->disabled(),
                TextInput::make('created_at')
                    ->label('Created')
                    ->disabled(),
            ])
            ->statePath('data')
            ->model($this->record);
    }
}

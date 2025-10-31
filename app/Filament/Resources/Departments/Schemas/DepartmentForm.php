<?php

namespace App\Filament\Resources\Departments\Schemas;

use Filament\Actions\Action;
use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;

class DepartmentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Department Name')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->live(onBlur: true)
            ]);
    }
}

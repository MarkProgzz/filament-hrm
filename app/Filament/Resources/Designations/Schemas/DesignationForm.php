<?php

namespace App\Filament\Resources\Designations\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;

class DesignationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label(' Title')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->live(onBlur: true)
            ]);
    }
}

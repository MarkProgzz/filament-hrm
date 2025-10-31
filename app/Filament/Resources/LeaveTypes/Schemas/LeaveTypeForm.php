<?php

namespace App\Filament\Resources\LeaveTypes\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;

class LeaveTypeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Leave Type Information')
                    ->schema([
                        Grid::make(3)
                            ->schema([
                                TextInput::make('name')
                                    ->required(),
                                TextInput::make('leave_balance')
                                    ->label('Leave Balance')
                                    ->numeric()
                                    ->required(),
                                TextInput::make('days_allowed')
                                    ->label('Days Allowed')
                                    ->numeric()
                                    ->integer()
                                    ->required(),
                            ]),
                    ]),
            ]);
    }
}

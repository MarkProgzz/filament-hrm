<?php

namespace App\Filament\Resources\Contracts\Schemas;

use App\Models\Employee;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;

class ContractForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Contract Information')
                    ->schema([
                        Select::make('employee_id')
                            ->label('Employee')
                            ->options(Employee::query()->get()->pluck('full_name', 'id'))
                            ->required(),
                        TextInput::make('contract_type')
                            ->required(),
                        DatePicker::make('start_date')
                            ->required(),
                        DatePicker::make('end_date'),
                        TextInput::make('salary')
                            ->numeric()
                            ->prefix('₱')
                            ->required(),
                        Textarea::make('terms'),
                        TextInput::make('status')
                            ->required(),
                    ]),
            ]);
    }
}

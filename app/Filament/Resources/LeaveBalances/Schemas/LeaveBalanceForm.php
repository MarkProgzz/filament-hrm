<?php

namespace App\Filament\Resources\LeaveBalances\Schemas;

use App\Models\Employee;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class LeaveBalanceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('employee_id')
                    ->label('Employee Name')
                    ->options(Employee::query()->get()->pluck('full_name', 'id'))
                    ->searchable(['full_name', 'school_id'])
                    ->loadingMessage('Loading employee...')
                    ->noSearchResultsMessage('No Employee found.')
                    ->required(),

                Select::make('leave_type_id')
                    ->relationship('leaveType', 'name')
                    ->required(),

                TextInput::make('balance')
                    ->required()
                    ->numeric()
                    ->default(0.0),

                TextInput::make('year')
                    ->required(),
            ]);
    }
}

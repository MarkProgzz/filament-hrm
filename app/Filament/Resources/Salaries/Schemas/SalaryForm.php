<?php

namespace App\Filament\Resources\Salaries\Schemas;

use App\Models\Employee;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;

class SalaryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Salary Information')
                    ->schema([
                        Select::make('employee_id')
                            ->label('Employee')
                            ->options(Employee::query()->get()->pluck('full_name', 'id'))
                            ->required(),
                        TextInput::make('base_salary')
                            ->numeric()
                            ->prefix('₱')
                            ->required(),
                        TextInput::make('allowances')
                            ->numeric()
                            ->prefix('₱')
                            ->default(0),
                        TextInput::make('deductions')
                            ->numeric()
                            ->prefix('₱')
                            ->default(0),
                        DatePicker::make('effective_date')
                            ->required(),
                        Select::make('pay_frequency')
                            ->options([
                                'monthly' => 'Monthly',
                                'weekly' => 'Weekly',
                                'bi-weekly' => 'Bi-weekly',
                                'daily' => 'Daily',
                            ])
                            ->default('monthly')
                            ->required(),
                    ]),
            ]);
    }
}

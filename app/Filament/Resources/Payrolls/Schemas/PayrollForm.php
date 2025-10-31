<?php

namespace App\Filament\Resources\Payrolls\Schemas;

use App\Models\Employee;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;

class PayrollForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Payroll Information')
                    ->schema([
                        Select::make('employee_id')
                            ->label('Employee')
                            ->options(Employee::query()->get()->pluck('full_name', 'id'))
                            ->required(),
                        DatePicker::make('period_start')
                            ->required(),
                        DatePicker::make('period_end')
                            ->required(),
                        TextInput::make('gross_pay')
                            ->numeric()
                            ->prefix('₱')
                            ->required(),
                        TextInput::make('total_deductions')
                            ->numeric()
                            ->prefix('₱')
                            ->default(0),
                        TextInput::make('net_pay')
                            ->numeric()
                            ->prefix('₱')
                            ->required(),
                        Select::make('payroll_status')
                            ->options([
                                'pending' => 'Pending',
                                'processed' => 'Processed',
                                'paid' => 'Paid',
                            ])
                            ->default('pending')
                            ->required(),
                        DatePicker::make('pay_date'),
                    ]),
            ]);
    }
}

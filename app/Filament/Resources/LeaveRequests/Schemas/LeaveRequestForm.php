<?php

namespace App\Filament\Resources\LeaveRequests\Schemas;

use App\Models\Employee;
use App\Models\LeaveType;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;

class LeaveRequestForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Leave Request Information')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Select::make('employee_id')
                                    ->label('Employee')
                                    ->options(Employee::query()->get()->pluck('full_name', 'id'))
                                    ->searchable()
                                    ->required(),

                                Select::make('leave_type_id')
                                    ->label('Leave Type')
                                    ->options(LeaveType::query()->get()->pluck('leave_type_id', 'id'))
                                    ->searchable()
                                    ->required(),
                            ]),

                        Grid::make(2)
                            ->schema([
                                Select::make('department_id')
                                    ->label('Employee')
                                    ->options(Employee::query()->get()->pluck('full_name', 'id'))
                                    ->searchable()
                                    ->required(),

                                Select::make('leave_type_id')
                                    ->label('Leave Type')
                                    ->options(LeaveType::query()->get()->pluck('leave_type_id', 'id'))
                                    ->searchable()
                                    ->required(),
                            ]),


                        Grid::make(2)
                            ->schema([
                                DatePicker::make('from_date')
                                    ->required(),
                                DatePicker::make('to_date')
                                    ->required(),
                            ]),

                        Textarea::make('reason')
                            ->required()
                            ->columnSpanFull(),

                        Grid::make(2)
                            ->schema([
                                DatePicker::make('applied_on')
                                    ->required(),
                                Select::make('approved_by')
                                    ->label('Approved By')
                                    ->options(Employee::query()->get()->pluck('full_name', 'id')),
                            ]),
                    ]),
            ]);
    }
}

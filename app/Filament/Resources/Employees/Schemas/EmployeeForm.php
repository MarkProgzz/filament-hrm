<?php

namespace App\Filament\Resources\Employees\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;

use App\Models\Department;
use App\Models\Designation;
use App\Models\EmploymentStatus;

class EmployeeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Employee Form')
                    ->schema([
                        Grid::make(5)
                            ->schema([
                                FileUpload::make('photo')
                                    ->label('Photo')
                                    ->image(),
                            ]),

                        Grid::make(2)
                            ->schema([
                                TextInput::make('school_id')->required()->unique(ignoreRecord: true),
                                DatePicker::make('entry_date')
                                    ->required()
                                    ->closeOnDateSelection(),
                            ]),

                        Grid::make(3)
                            ->schema([
                                TextInput::make('first_name')
                                    ->required(),
                                TextInput::make('last_name')
                                    ->required(),
                                TextInput::make('middle_name'),
                            ]),

                        Grid::make(4)
                            ->schema([
                                TextInput::make('street'),
                                TextInput::make('barangay'),
                                TextInput::make('municipality'),
                                TextInput::make('province'),
                            ]),

                        Grid::make(4)
                            ->schema([
                                DatePicker::make('birthdate')
                                    ->required()
                                    ->placeholder(now())
                                    ->closeOnDateSelection(),
                                TextInput::make('birthplace'),
                                TextInput::make('citizenship'),
                                TextInput::make('religion'),
                                TextInput::make('distinguishing_marks')
                                    ->columnSpanFull(),
                            ]),

                        Grid::make(3)
                            ->schema([
                                TextInput::make('height'),
                                TextInput::make('weight'),
                                TextInput::make('blood_type'),
                            ]),

                        Grid::make(2)
                            ->schema([
                                Select::make('department_id')
                                    ->relationship('Department', 'name')
                                    ->options(Department::query()->pluck('name', 'id'))
                                    ->searchable(['name'])
                                    ->loadingMessage('Loading Departments...')
                                    ->noSearchResultsMessage('No authors found.')
                                    ->required(),

                                Select::make('employment_status_id')
                                    ->relationship('employmentStatus', 'name')
                                    ->options(EmploymentStatus::query()->pluck('name', 'id'))
                                    ->searchable(['name'])
                                    ->loadingMessage('Loading Employment Status...')
                                    ->noSearchResultsMessage('No Employment Status found.')
                                    ->nullable(),
                            ]),

                        Grid::make(2)
                            ->schema([
                                Select::make('gender')
                                    ->options(['Male' => 'Male', 'Female' => 'Female'])
                                    ->required(),

                                Select::make('civil_status')
                                    ->options([
                                        'Single' => 'Single',
                                        'Married' => 'Married',
                                        'Widowed' => 'Widowed',
                                        'Separated' => 'Separated',
                                        'Divorced' => 'Divorced',
                                        'Solo Parent' => 'Solo Parent'
                                    ])->required(),

                                TextInput::make('no_children')
                                    ->numeric()
                                    ->columnSpanFull(),
                            ]),

                        Grid::make(3)
                            ->schema([
                                TextInput::make('email')
                                    ->email()
                                    ->required()
                                    ->unique(ignoreRecord: true),
                                TextInput::make('landline_number'),
                                TextInput::make('phone_number')
                                    ->tel()
                                    ->mask('9999 999 9999')
                                    ->stripCharacters([' '])
                                    ->maxLength(15)
                                    ->rule('regex:/^[0-9]{11}$/')
                                    ->validationMessages([
                                        'regex' => 'Only numbers are allowed and must be exactly 11 digits.',
                                    ])
                            ]),

                        Grid::make(2)
                            ->schema([
                                TextInput::make('tin_no'),
                                TextInput::make('sss_no'),
                                TextInput::make('pagibig_no'),
                                TextInput::make('philhealth_no'),
                                Grid::make(2)
                                    ->schema([
                                        TextInput::make('prc_reg_no'),
                                        DatePicker::make('prc_expired')
                                            ->required()
                                            ->placeholder(now())
                                            ->closeOnDateSelection(),
                                    ])->columnSpanFull(),
                            ]),



                    ])->columnSpanFull(),

            ]);
    }
}

<?php

namespace App\Filament\Resources\Salaries\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SalariesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('employee.full_name')
                    ->label('Employee')
                    ->searchable(),
                TextColumn::make('base_salary')
                    ->money('PHP')
                    ->sortable(),
                TextColumn::make('allowances')
                    ->money('PHP')
                    ->sortable(),
                TextColumn::make('deductions')
                    ->money('PHP')
                    ->sortable(),
                TextColumn::make('effective_date')
                    ->date()
                    ->sortable(),
                TextColumn::make('pay_frequency')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}

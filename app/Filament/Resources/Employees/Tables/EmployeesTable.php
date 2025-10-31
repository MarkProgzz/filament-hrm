<?php

namespace App\Filament\Resources\Employees\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Support\Enums\Alignment;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Table;

class EmployeesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                ImageColumn::make('photo')
                    ->circular()
                    ->imageHeight(24)
                    ->imageWidth(24)
                    ->getStateUsing(fn($record) => $record->profile_picture),

                TextColumn::make('school_id')
                    ->label('School Id')
                    ->color('gray')
                    ->size('sm')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('full_name')
                    ->weight('bold')
                    ->searchable(),

                TextColumn::make('department.name')
                    ->Label('Department')
                    ->searchable(),

                TextColumn::make('employmentStatus.name')
                    ->Label('Employment Status'),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}

<?php

namespace App\Filament\Resources\Profiles\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProfilesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->searchable(),
                TextColumn::make('first_name')
                    ->searchable(),
                TextColumn::make('last_name')
                    ->searchable(),
                TextColumn::make('father_name')
                    ->searchable(),
                TextColumn::make('mother_name')
                    ->searchable(),
                TextColumn::make('gender')
                    ->searchable(),
                TextColumn::make('religion')
                    ->searchable(),
                TextColumn::make('dob')
                    ->date()
                    ->sortable(),
                TextColumn::make('nid')
                    ->searchable(),
                TextColumn::make('phone')
                    ->searchable(),
                TextColumn::make('secondary_phone')
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email address')
                    ->searchable(),
                TextColumn::make('secondary_email')
                    ->searchable(),
                TextColumn::make('objective')
                    ->searchable(),
                TextColumn::make('present_salary')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('expected_salary')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('job_level')
                    ->searchable(),
                TextColumn::make('job_nature')
                    ->searchable(),
                TextColumn::make('special_qualification')
                    ->searchable(),
                TextColumn::make('keyword')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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

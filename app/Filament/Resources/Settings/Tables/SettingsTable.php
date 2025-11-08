<?php

namespace App\Filament\Resources\Settings\Tables;

use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SettingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('key')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('description')
                    ->searchable()
                    ->limit(50),
                TextColumn::make('type')
                    ->searchable()
                    ->sortable(),
                ImageColumn::make('value')
                    ->label('Value')
                    ->square()
                    ->height(50)
                    ->width(50)
                    ->defaultImageUrl(fn (?\App\Models\Setting $record): ?string => $record?->type === 'image' ? null : null)
                    ->visible(fn (?\App\Models\Setting $record): bool => $record?->type === 'image'),
                TextColumn::make('value')
                    ->label('Value')
                    ->limit(50)
                    ->visible(fn (?\App\Models\Setting $record): bool => $record?->type !== 'image'),
            ])
            ->filters([
                //
            ])
            ->actions([
                \Filament\Actions\EditAction::make(),
            ])
            ->bulkActions([
                \Filament\Actions\BulkActionGroup::make([
                    \Filament\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
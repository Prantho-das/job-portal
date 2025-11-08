<?php

namespace App\Filament\Resources\Jobs\Tables;


use App\Filament\Resources\Applications\ApplicationResource;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Filament\Tables\Columns\IconColumn;
class JobsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
            TextColumn::make('id')->sortable(),
            TextColumn::make('title')->sortable()->searchable()->limit(40),
            TextColumn::make('company.name')->label('Company')->sortable()->searchable(),
            TextColumn::make('location')->sortable()->limit(25),
            TextColumn::make('salary_min')->label('Salary Range')->formatStateUsing(fn($state, $record) => "{$record->salary_min} - {$record->salary_max}"),
            BadgeColumn::make('status')->colors([
                'success' => 'active',
                'danger' => 'inactive',
                'warning' => 'expired',
            ]),
            IconColumn::make('is_hot')->boolean()->label('Hot'),
            TextColumn::make('deadline')->date()->sortable(),
            TextColumn::make('applications_count')->counts('applications')->label('Applications'),
            TextColumn::make('created_at')->dateTime()->sortable(),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->recordActions([
                EditAction::make(),
                Action::make('viewApplications')
                    ->label('View Applications')
                    ->url(fn ($record) => ApplicationResource::getUrl('index', ['tableFilters' => ['job_id' => $record->id]]))
                    ->icon('heroicon-o-document-text')
                    ->color('info'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }
}
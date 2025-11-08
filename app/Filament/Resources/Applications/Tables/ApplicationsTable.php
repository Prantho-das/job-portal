<?php

namespace App\Filament\Resources\Applications\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Relations\Relation;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\ViewColumn;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\Layout\Grid;
use Filament\Tables\Columns\Layout\Panel;
use Filament\Tables\Columns\Layout\Card;
use Filament\Tables\Columns\Layout\Section;
use Filament\Tables\Columns\Layout\Tabs;
use Filament\Tables\Columns\Layout\Tab;
use Filament\Tables\Columns\Layout\Fieldset;
use Filament\Tables\Columns\Layout\Column;
use Filament\Tables\Columns\Layout\Row;
use Filament\Tables\Columns\Layout\View;
use Filament\Tables\Columns\Layout\Component;
use Filament\Tables\Columns\Layout\Placeholder;
use Filament\Tables\Columns\Layout\Wrapper;
use Filament\Tables\Columns\Layout\Align;
use Filament\Tables\Columns\Layout\Hidden;
use Filament\Tables\Columns\Layout\Visible;
use Filament\Tables\Columns\Layout\Expandable;
use Filament\Tables\Columns\Layout\Collapsible;
use Filament\Tables\Columns\Layout\Toggleable;
use Filament\Tables\Columns\Layout\Select;
use Filament\Tables\Columns\Layout\TextInput;
use Filament\Tables\Columns\Layout\Textarea;
use Filament\Tables\Columns\Layout\RichEditor;
use Filament\Tables\Columns\Layout\MarkdownEditor;
use Filament\Tables\Columns\Layout\DatePicker;
use Filament\Tables\Columns\Layout\TimePicker;
use Filament\Tables\Columns\Layout\DateTimePicker;
use Filament\Tables\Columns\Layout\ColorPicker;
use Filament\Tables\Columns\Layout\Checkbox;
use Filament\Tables\Columns\Layout\Radio;
use Filament\Tables\Columns\Layout\Toggle;
use Filament\Tables\Columns\Layout\KeyValue;
use Filament\Tables\Columns\Layout\Repeater;
use Filament\Tables\Columns\Layout\Builder;
use Filament\Tables\Columns\Layout\TagsInput;
use Filament\Tables\Columns\Layout\SelectInput;
use Filament\Tables\Columns\Layout\MultiSelect;
use Filament\Tables\Columns\Layout\CheckboxList;
use Filament\Tables\Columns\Layout\RadioList;
use Filament\Tables\Columns\Layout\ToggleButtons;
use Filament\Tables\Columns\Layout\Rating;
use Filament\Tables\Columns\Layout\Slider;
use Filament\Tables\Columns\Layout\RangeSlider;
use Filament\Tables\Columns\Layout\FileUpload;
use Filament\Tables\Columns\Layout\ImageUpload;
use Filament\Tables\Columns\Layout\Avatar;
use Filament\Tables\Columns\Layout\SignaturePad;
use Filament\Tables\Columns\Layout\CodeEditor;
use Filament\Tables\Columns\Layout\Markdown;
use Filament\Tables\Columns\Layout\Html;
use Filament\Tables\Columns\Layout\Badge;
use Filament\Tables\Columns\Layout\Boolean;
use Filament\Tables\Columns\Layout\Color;
use Filament\Tables\Columns\Layout\DateTime;
use Filament\Tables\Columns\Layout\Image;
use Filament\Tables\Columns\Layout\Text;
use Filament\Tables\Columns\Layout\Link;
use Filament\Tables\Columns\Layout\Url;
use Filament\Tables\Columns\Layout\Email;
use Filament\Tables\Columns\Layout\Phone;
use Filament\Tables\Columns\Layout\BadgeColumn;
use Filament\Tables\Columns\Layout\IconColumn;
use Filament\Tables\Columns\Layout\LinkColumn;
use Illuminate\Support\Facades\Storage;
use Filament\Actions\Action;

class ApplicationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('job.title')
                    ->searchable(),
                TextColumn::make('user.name')
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email address')
                    ->searchable(),
                TextColumn::make('phone')
                    ->searchable(),
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('cv_path')
                    ->label('CV')
                    ->formatStateUsing(function (string $state): ?string {
                        if (!$state) {
                            return null;
                        }
                        $url = Storage::url($state);
                        return '<a href="' . $url . '" target="_blank" class="text-primary-600 hover:underline">Download CV</a>';
                    })
                    ->html()
                    ->searchable(),
                TextColumn::make('status')
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
                SelectFilter::make('job_id')
                    ->relationship('job', 'title')
                    ->label('Job Title'),
            ])
            ->recordActions([
                EditAction::make(),
                Action::make('downloadCv')
                    ->label('Download CV')
                    ->icon('heroicon-o-document-arrow-down')
                    ->url(fn ($record) => Storage::url($record->cv_path))
                    ->openUrlInNewTab()
                    ->hidden(fn ($record) => empty($record->cv_path)),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
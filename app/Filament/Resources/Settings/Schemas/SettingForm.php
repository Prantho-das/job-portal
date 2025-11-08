<?php

namespace App\Filament\Resources\Settings\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;

class SettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('key')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255)
                    ->disabled(fn (?\App\Models\Setting $record) => $record !== null), // Disable key on edit
                Textarea::make('description')
                    ->nullable()
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Select::make('type')
                    ->options([
                        'text' => 'Text',
                        'image' => 'Image',
                        'url' => 'URL',
                        'textarea' => 'Textarea',
                        'richtext' => 'Rich Text', // Added rich text option
                    ])
                    ->required()
                    ->reactive(), // Make the field reactive to update other fields
                TextInput::make('value')
                    ->label('Value')
                    ->required(fn (Get $get): bool => $get('type') === 'text' || $get('type') === 'url')
                    ->hidden(fn (Get $get): bool => $get('type') !== 'text' && $get('type') !== 'url')
                    ->maxLength(255),
                Textarea::make('value')
                    ->label('Value')
                    ->required(fn (Get $get): bool => $get('type') === 'textarea')
                    ->hidden(fn (Get $get): bool => $get('type') !== 'textarea')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                RichEditor::make('value')
                    ->label('Value')
                    ->required(fn (Get $get): bool => $get('type') === 'richtext')
                    ->hidden(fn (Get $get): bool => $get('type') !== 'richtext')
                    ->fileAttachmentsDisk('public')
                    ->fileAttachmentsDirectory('settings_richtext_images')
                    ->fileAttachmentsVisibility('public')
                    ->columnSpanFull(),
                FileUpload::make('value')
                    ->label('Value')
                    ->required(fn (Get $get): bool => $get('type') === 'image')
                    ->hidden(fn (Get $get): bool => $get('type') !== 'image')
                    ->image()
                    ->directory('settings_images') // Store images in 'public/settings_images'
                    ->visibility('public'),
            ]);
    }
}
<?php

namespace App\Filament\Resources\Settings\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
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
                ->disabled(fn(?\App\Models\Setting $record) => $record !== null),

            Textarea::make('description')
                ->nullable()
                ->maxLength(65535)
                ->columnSpanFull(),

            Select::make('type')
                ->label('Type')
                ->options([
                    'text' => 'Text',
                    'textarea' => 'Textarea',
                    'richtext' => 'Rich Text',
                    'image' => 'Image',
                ])
                ->required()
                ->reactive(),

            // Text Input for 'text' type
            TextInput::make('value_text')
    ->label('Value')
    ->visible(fn(Get $get) => $get('type') === 'text')
    ->reactive()
    ->lazy()                // <<< এখানে lazy() যোগ করলাম
    ->dehydrated(false)
    ->afterStateUpdated(function ($state, callable $set, Get $get) {
        if ($get('type') === 'text' && $state !== $get('value')) {
            $set('value', $state);
        }
    }),

    Textarea::make('value_textarea')
    ->label('Value')
    ->visible(fn(Get $get) => $get('type') === 'textarea')
    ->reactive()
    ->lazy()                // <<< এখানে lazy() যোগ করলাম
    ->dehydrated(false)
    ->afterStateUpdated(function ($state, callable $set, Get $get) {
        if ($get('type') === 'textarea' && $state !== $get('value')) {
            $set('value', $state);
        }
    }),

RichEditor::make('value_richtext')
    ->label('Value')
    ->visible(fn(Get $get) => $get('type') === 'richtext')
    ->reactive()
    ->lazy()                // <<< এখানে lazy() যোগ করলাম
    ->dehydrated(false)
    ->afterStateUpdated(function ($state, callable $set, Get $get) {
        if ($get('type') === 'richtext' && $state !== $get('value')) {
            $set('value', $state);
        }
    }),

            FileUpload::make('value_image')
                ->label('Value')
                ->visible(fn(Get $get) => $get('type') === 'image')
                ->image()
                ->maxFiles(1)
                ->directory('settings_images')
                ->disk('public')
                ->preserveFilenames()
                ->dehydrated(true)
                ->dehydrateStateUsing(function ($state) {
                    \Log::info('🧩 dehydrateStateUsing', ['state' => $state]);
                    if (is_array($state)) {
                        return $state[0] ?? null;
                    }
                    return $state;
                })
                ->afterStateHydrated(function (Set $set, $state) {
                    \Log::info('📂 afterStateHydrated', ['state' => $state]);
                    if (is_string($state) && $state !== '') {
                        $set('value_image', [$state]);
                    }
                })
                ->afterStateUpdated(function ($state, Set $set, Get $get) {
                    \Log::info('📤 afterStateUpdated', ['state' => $state]);
                    if ($get('type') === 'image') {
                        if (is_array($state)) {
                            $set('value', $state[0] ?? null);
                        } else {
                            $set('value', $state);
                        }
                    }
                }),



            TextInput::make('value')
                ->hidden()
                ->dehydrated(true)
                ->afterStateHydrated(function (Get $get, callable $set, $state) {
                    $type = $get('type');
                    if (!$type) return;

                    switch ($type) {
                        case 'text':
                            $set('value_text', $state);
                            break;
                        case 'textarea':
                            $set('value_textarea', $state);
                            break;
                        case 'richtext':
                            $set('value_richtext', $state);
                            break;
                        case 'image':
                            $set('value_image', $state ? [$state] : []);
                            break;
                    }
                })
                ->afterStateUpdated(function ($state) {
                    \Log::info('💾 Hidden value updated', ['state' => $state]);
                }),






        ]);
    }
}
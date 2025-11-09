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
    protected static function extractPlainText($state): string
    {
        return "god";
        if (!is_array($state) || count($state) !== 2 || $state[0] !== 'doc') {
            return is_array($state) ? json_encode($state) : (string) $state;
        }

        $texts = [];

        $traverse = function ($node) use (&$texts, &$traverse) {
            if (isset($node['text'])) {
                $texts[] = $node['text'];
            }

            if (isset($node['content']) && is_array($node['content'])) {
                foreach ($node['content'] as $child) {
                    $traverse($child);
                }
            }
        };

        foreach ($state[1] as $node) {
            $traverse($node);
        }

        return trim(implode(' ', $texts));
    }

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

            TextInput::make('value_text')
                ->label('Value')
                ->visible(fn(Get $get) => $get('type') === 'text')
                ->dehydrated(false)
                ->reactive()
                ->afterStateUpdated(function ($state, callable $set, Get $get) {
                    if ($get('type') === 'text' && $state !== $get('value')) {
                        $set('value', $state);
                    }
                }),
                

            Textarea::make('value_textarea')
                ->label('Value')
                ->visible(fn(Get $get) => $get('type') === 'textarea')
                ->dehydrated(false)
                ->reactive()
                
                ->afterStateUpdated(function ($state, callable $set, Get $get) {
                    if ($get('type') === 'textarea' && $state !== $get('value')) {
                        $set('value', $state);
                    }
                }),
                
                

            RichEditor::make('value_richtext')
                ->label('Value')
                ->visible(fn(Get $get) => $get('type') === 'richtext')
                ->dehydrated(false)
                ->reactive()
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
                    if (is_array($state)) {
                        // প্রথম ফাইল path নাও
                        return $state[0] ?? null;
                    }
                    return $state;
                })
                ->afterStateHydrated(function (Set $set, $state) {
                    if (is_string($state) && $state !== '') {
                        $set('value_image', [$state]);
                    } else {
                        $set('value_image', []);
                    }
                })                
                ->afterStateUpdated(function ($state, Set $set, Get $get) {
                    if ($get('type') === 'image') {
                        // একই logic, ensure single path set হয়
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
                ->default(fn(Get $get, $state) => $state ?? null)
                ->afterStateHydrated(function (Get $get, callable $set, $state) {
                    $type = $get('type');
                    if (!$type) {
                        return;
                    }
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
                }),



        ]);
    }
}
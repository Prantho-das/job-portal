<?php

namespace App\Filament\Resources\Pages\Schemas;

use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\FileUpload; // Import FileUpload
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class PageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),
                TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true),
                FileUpload::make('featured_image') // Added FileUpload for featured_image
                    ->image()
                    ->directory('page_featured_images') // Store featured images in 'public/page_featured_images'
                    ->visibility('public')
                    ->nullable(),
                RichEditor::make('content')
                    ->columnSpanFull()
                    ->fileAttachmentsDisk('public') // Use the 'public' disk for file attachments
                    ->fileAttachmentsDirectory('pages_images') // Store images in 'public/pages_images'
                    ->fileAttachmentsVisibility('public') // Make attachments publicly accessible
                    ->nullable(),
                Select::make('status')
                    ->options([
                        'draft' => 'Draft',
                        'published' => 'Published',
                        'archived' => 'Archived',
                    ])
                    ->required()
                    ->default('draft'),
                TextInput::make('seo_title')
                    ->maxLength(255)
                    ->nullable(),
                TextInput::make('seo_description')
                    ->maxLength(255)
                    ->nullable(),
                TextInput::make('seo_keywords')
                    ->maxLength(255)
                    ->nullable(),
                Hidden::make('user_id')
                    ->default(auth()->id())
                    ->required(),
            ]);
    }
}
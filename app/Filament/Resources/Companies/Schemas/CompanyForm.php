<?php

namespace App\Filament\Resources\Companies\Schemas;

use App\Models\Company;
use Filament\Schemas\Schema;

class CompanyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
            \Filament\Schemas\Components\Section::make([
                    \Filament\Forms\Components\TextInput::make('name')
                        ->label('Company Name')
                        ->required()
                        ->maxLength(255)
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn($state, callable $set) => $set('slug', \Str::slug($state))),

                    \Filament\Forms\Components\TextInput::make('slug')
                        ->label('Slug')
                        ->required()
                        ->unique(Company::class, 'slug', ignoreRecord: true),

                    \Filament\Forms\Components\FileUpload::make('logo')
                        ->label('Company Logo')
                        ->directory('companies/logos')
                        ->disk('public')
                        ->image()
                        ->imageEditor()
                        ->maxSize(1024)
                        ->nullable(),

                    \Filament\Forms\Components\TextInput::make('industry')
                        ->label('Industry')
                        ->maxLength(255)
                        ->nullable(),

                    \Filament\Forms\Components\DatePicker::make('founded_at')
                        ->label('Founded At')
                        ->nullable(),
                ])->columns(2),

            \Filament\Schemas\Components\Section::make('Contact Info')->schema([
                    \Filament\Forms\Components\TextInput::make('website')
                        ->label('Website')
                        ->url()
                        ->placeholder('https://example.com')
                        ->maxLength(255)
                        ->nullable(),

                    \Filament\Forms\Components\TextInput::make('email')
                        ->label('Email')
                        ->email()
                        ->nullable(),

                    \Filament\Forms\Components\TextInput::make('phone')
                        ->label('Phone')
                        ->tel()
                        ->nullable(),

                    \Filament\Forms\Components\TextInput::make('address')->maxLength(255)->nullable(),
                    \Filament\Forms\Components\TextInput::make('city')->maxLength(255)->nullable(),
                    \Filament\Forms\Components\TextInput::make('country')->maxLength(255)->nullable(),
                ])->columns(2),

                \Filament\Schemas\Components\Section::make('About')->schema([
                    \Filament\Forms\Components\Textarea::make('description')
                        ->label('Description')
                        ->rows(4)
                        ->maxLength(1000)
                        ->nullable(),
                ]),

                \Filament\Forms\Components\Select::make('status')
                    ->label('Status')
                    ->options([
                        'active' => 'Active',
                        'inactive' => 'Inactive',
                        'banned' => 'Banned',
                    ])
                    ->default('active')
                    ->required(),

                \Filament\Forms\Components\Select::make('employer_id')
                    ->label('Employer')
                    ->relationship('employer', 'name')
                    ->searchable()
                    ->nullable()
                    ->helperText('Optional: Link this company to a registered employer user.'),
            ]);
    }
}
<?php

namespace App\Filament\Resources\Jobs\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TagsInput;
use Illuminate\Support\Str;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;

class JobForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Basic Info')->schema([
                    TextInput::make('user_id')
                        ->hidden()
                        ->default(Auth::id())
                        ->required(),
                    Select::make('company_id')
                        ->label('Company')
                        ->relationship('company', 'name')
                        ->required()
                        ->searchable(),

                    TextInput::make('title')
                        ->label('Job Title')
                        ->required()
                        ->maxLength(255)
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn($state, callable $set) => $set('slug', Str::slug($state))),

                    TextInput::make('slug')
                        ->label('Slug')
                        ->required()
                        ->unique(Job::class, 'slug', ignoreRecord: true),

                    TextInput::make('ref_no')
                        ->label('Reference No.')
                        ->nullable()
                        ->maxLength(100),

                    Select::make('status')
                        ->label('Status')
                        ->options([
                            'active' => 'Active',
                            'inactive' => 'Inactive',
                            'expired' => 'Expired',
                        ])
                        ->default('active')
                        ->required(),

                    Select::make('job_type')
                        ->label('Job Type')
                        ->options([
                            'full-time' => 'Full Time',
                            'part-time' => 'Part Time',
                            'contract' => 'Contract',
                            'internship' => 'Internship',
                            'remote' => 'Remote',
                        ])
                        ->required(),
                ])->columns(2)->columnSpanFull(),

                Section::make('Details')->schema([
                    RichEditor::make('description')->label('Job Description')->required(),
                    RichEditor::make('requirements')->label('Requirements'),
                    RichEditor::make('responsibilities')->label('Responsibilities'),
                    RichEditor::make('benefits')->label('Benefits'),
                ])->columns(2)->columnSpanFull(),

                Section::make('Company Information')->schema([
                    TextInput::make('location')->required()->maxLength(255),
                    TextInput::make('salary_min')->numeric()->label('Salary Min'),
                    TextInput::make('salary_max')->numeric()->label('Salary Max'),
                    TextInput::make('experience_min')->numeric()->label('Min Experience (yrs)'),
                    TextInput::make('experience_max')->numeric()->label('Max Experience (yrs)'),
                    TextInput::make('age_min')->numeric()->label('Min Age'),
                    TextInput::make('age_max')->numeric()->label('Max Age'),
                    Select::make('gender_preference')->options([
                        'any' => 'Any',
                        'male' => 'Male',
                        'female' => 'Female',
                    ])->default('any'),
                    DatePicker::make('deadline')->required(),
                    Toggle::make('is_hot')->label('Featured Job'),
                ])->columns(3)->columnSpanFull(),

                Section::make('Relations')->schema([
                    Select::make('categories')
                        ->multiple()
                        ->label('Categories')
                        ->relationship('categories', 'name')
                        ->preload()
                        ->searchable(),

                    Select::make('educationLevels')
                        ->multiple()
                        ->label('Education Levels')
                        ->relationship('educationLevels', 'name')
                        ->preload()
                        ->searchable(),
                ])->columns(2),

                Section::make('SEO / Keywords')->schema([
                    TagsInput::make('keywords')
                        ->label('Keywords / Tags')
                        ->placeholder('Press Enter to add keywords'),
                ]),
            ]);
    }
}

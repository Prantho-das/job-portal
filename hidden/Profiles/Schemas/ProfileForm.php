<?php

namespace App\Filament\Resources\Profiles\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ProfileForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
                TextInput::make('first_name')
                    ->required(),
                TextInput::make('last_name')
                    ->required(),
                TextInput::make('father_name'),
                TextInput::make('mother_name'),
                TextInput::make('gender'),
                TextInput::make('religion'),
                DatePicker::make('dob'),
                TextInput::make('nid'),
                TextInput::make('phone')
                    ->tel(),
                TextInput::make('secondary_phone')
                    ->tel(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email(),
                TextInput::make('secondary_email')
                    ->email(),
                Textarea::make('present_address')
                    ->columnSpanFull(),
                Textarea::make('permanent_address')
                    ->columnSpanFull(),
                TextInput::make('objective'),
                TextInput::make('present_salary')
                    ->numeric(),
                TextInput::make('expected_salary')
                    ->numeric(),
                TextInput::make('job_level'),
                TextInput::make('job_nature'),
                Textarea::make('career_summary')
                    ->columnSpanFull(),
                TextInput::make('special_qualification'),
                TextInput::make('keyword'),
            ]);
    }
}

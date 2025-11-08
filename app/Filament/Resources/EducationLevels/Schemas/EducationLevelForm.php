<?php

namespace App\Filament\Resources\EducationLevels\Schemas;

use App\Models\EducationLevel;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class EducationLevelForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
            TextInput::make('name')
                ->label('Education Level Name')
                ->required()
                ->maxLength(255),
                
            Textarea::make('description')
                ->label('Description')
                ->rows(3)
                ->maxLength(500)
                ->nullable(),



















            ]);
    }
}
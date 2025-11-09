<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Hash;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                Select::make('company_id')
                    ->label('Company')
                    ->options(\App\Models\Company::pluck('name', 'id')->toArray())
                    ->required(),
                DateTimePicker::make('email_verified_at'),
                TextInput::make('password')
                    ->password()
                    ->dehydrateStateUsing(fn(string $state): string => Hash::make($state))
                    ->dehydrated(fn(?string $state): bool => filled($state))
                    ->required(fn(string $operation): bool => $operation === 'create'),
                Select::make('role')
                    ->options([
                        'admin' => 'Admin',
                        'employee' => 'Employee',
                        'user' => 'User',
                    ])
                    ->required()
                    ->default('user'),
                TextInput::make('phone')
                    ->tel(),
                Select::make('status')
                    ->options([
                        'active' => 'active',
                        'inactive' => 'inactive',
                        'banned' => 'banned',
                    ])
                    ->required()
                    ->default('active'),
                TextInput::make('status')
                    ->required()
                    ->default('active'),
            ]);
    }
}
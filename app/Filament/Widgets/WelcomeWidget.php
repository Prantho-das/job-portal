<?php

namespace App\Filament\Widgets;

use App\Models\Company;
use App\Models\Job;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class WelcomeWidget extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Users', User::count())
                ->description('All registered users')
                ->descriptionIcon('heroicon-s-users')
                ->color('primary'),
            Stat::make('Total Companies', Company::count())
                ->description('Companies listed')
                ->descriptionIcon('heroicon-s-building-office')
                ->color('success'),
            Stat::make('Total Jobs', Job::count())
                ->description('Active job listings')
                ->descriptionIcon('heroicon-s-briefcase')
                ->color('warning'),
        ];
    }
}
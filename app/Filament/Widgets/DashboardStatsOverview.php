<?php

namespace App\Filament\Widgets;

use App\Models\ContactMessage;
use App\Models\Equipment;
use App\Models\JobApplication;
use App\Models\Project;
use App\Models\QuoteRequest;
use App\Models\Service;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashboardStatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Projects', Project::count())
                ->description('All active and completed')
                ->descriptionIcon('heroicon-m-building-office')
                ->color('success'),
            Stat::make('Active Services', Service::where('is_active', true)->count())
                ->description('Currently offered')
                ->descriptionIcon('heroicon-m-briefcase')
                ->color('primary'),
            Stat::make('Equipment Fleet', Equipment::where('active', true)->count())
                ->description('Available machinery')
                ->descriptionIcon('heroicon-m-truck')
                ->color('warning'),
            Stat::make('New RFQs', QuoteRequest::where('status', 'New')->count())
                ->description('Pending quote requests')
                ->descriptionIcon('heroicon-m-currency-dollar')
                ->color('danger'),
            Stat::make('New Messages', ContactMessage::where('status', 'New')->count())
                ->description('Unread contact messages')
                ->descriptionIcon('heroicon-m-envelope')
                ->color('info'),
            Stat::make('Job Applications', JobApplication::where('status', 'New')->count())
                ->description('New candidate submissions')
                ->descriptionIcon('heroicon-m-users')
                ->color('gray'),
        ];
    }
}

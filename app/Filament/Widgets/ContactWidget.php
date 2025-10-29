<?php

namespace App\Filament\Widgets;

use App\Models\Addresses;
use App\Models\Contacts;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ContactWidget extends StatsOverviewWidget
{
    protected static ?int $sort = 1;



    protected function getStats(): array
    {
        $totalContact = Contacts::count();
        $totalContactToday = Contacts::whereDate('created_at', today())->count();
        $totalUser = User::count();
        $totalAddress = Addresses::count();

        return [
            Stat::make('Total Contact', $totalContact)->description('Total Contact')->color('success'),
            Stat::make('Today Contact', $totalContactToday)->description('Today Contact')->color('success'),
            Stat::make('Total User', $totalUser)->description('Total User')->color('success'),
            Stat::make('Total Address', $totalAddress)->description('Total Address')->color('success'),
        ];
    }


}

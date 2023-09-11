<?php

namespace App\Filament\Resources\EmployeeResource\Widgets;

use App\Models\Country;
use App\Models\Employee;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class EmployeeStatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $jp = Country::where('country_code', 'JP')->withCount('employees')->first();
        $uk = Country::where('country_code', 'UK')->withCount('employees')->first();
        return [
            Stat::make('Employees', Employee::all()->count()),
            Stat::make($jp->name . ' Employees', $jp->employees_count),
            Stat::make($uk->name . ' Employees', $uk->employees_count),
        ];
    }
}

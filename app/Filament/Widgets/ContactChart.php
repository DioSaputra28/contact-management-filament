<?php

namespace App\Filament\Widgets;

use App\Models\Contacts;
use Filament\Widgets\ChartWidget;

class ContactChart extends ChartWidget
{
    protected ?string $heading = 'Contact Chart';

    protected ?string $maxHeight = '300px';

    protected static ?int $sort = 2;

    protected int|string|array $columnSpan = 'full';

    protected static bool $isLazy = true;

    protected function getData(): array
    {
        $year = now()->year;

        $contacts = Contacts::selectRaw('EXTRACT(MONTH FROM created_at) AS month, COUNT(*) AS total')
            ->whereYear('created_at', $year)
            ->groupByRaw('EXTRACT(MONTH FROM created_at)')
            ->pluck('total', 'month');

        $data = [];
        for ($i = 1; $i <= 12; $i++) {
            $data[] = $contacts[$i] ?? 0;
        }

        return [
            'datasets' => [
                [
                    'label' => "Contacts Added in $year",
                    'data' => $data,
                    'borderWidth' => 2,
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        ];
    }


    protected function getType(): string
    {
        return 'line';
    }

    public function getColumns(): int | array
    {
        return 4;
    }
}

<?php

namespace App\Livewire\Pages;

use App\Models\QrLink;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Livewire\Component;

class Dashboard extends Component
{
    public $days = 7;

    public function render()
    {
        // top qr links visited by last 7 days
        $topQrLinks = QrLink::withCount('visits')
            ->orderBy('visits_count', 'desc')
            ->whereHas('visits', function ($query) {
                $query->where('created_at', '>=', now()->subDays($this->days));
            })
            ->take(5)
            ->get();

        $columnChartModel = (new ColumnChartModel())
            ->setTitle('Top QR Links');

        foreach ($topQrLinks as $qrLink) {
            $columnChartModel->addColumn(
                $qrLink->name, 
                $qrLink->visits_count, 
                sprintf('#%06X', mt_rand(0, 0xFFFFFF)));
        }

        return view('livewire.pages.dashboard', compact('topQrLinks', 'columnChartModel'));
    }
}

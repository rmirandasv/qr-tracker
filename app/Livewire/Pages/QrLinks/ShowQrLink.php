<?php

namespace App\Livewire\Pages\QrLinks;

use App\Models\QrLink;
use Asantibanez\LivewireCharts\Models\LineChartModel;
use Livewire\Component;

class ShowQrLink extends Component
{
    public QrLink $qrLink;
    public $days = 7;

    public function mount(QrLink $qrLink)
    {
        $this->qrLink = $qrLink;
    }

    public function render()
    {
        $qrLinkTodayVisits = $this->qrLink
            ->visits()
            ->whereDate('created_at', today())
            ->count();

        $qrLinkYesterdayVisits = $this->qrLink
            ->visits()
            ->whereDate('created_at', today()
            ->subDay())
            ->count();

        $visitsPerDay = $this->qrLink
            ->visits()
            ->selectRaw('date(created_at) as date, count(*) as count')
            ->where('created_at', '>=', today()->subDays($this->days))
            ->groupBy('date')
            ->orderBy('date')
            ->get()
            ->toArray();

        $lineChartModel = (new LineChartModel())
            ->setTitle(__('Visits per day'))
            ->setAnimated(true)
            ->withGrid();
        
        foreach ($visitsPerDay as $visitPerDay) {
            $lineChartModel->addPoint($visitPerDay['date'], $visitPerDay['count']);
        }
        
        return view('livewire.pages.qr-links.show-qr-link', 
            compact(
                'qrLinkTodayVisits', 
                'qrLinkYesterdayVisits', 
                'visitsPerDay',
                'lineChartModel'));
    }
    
}

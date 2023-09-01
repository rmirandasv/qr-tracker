<?php

namespace App\Livewire\Pages\QrLinks;

use App\Models\QrLinkGroup;
use Livewire\Component;
use Livewire\WithPagination;

class QrLinkIndex extends Component
{
    use WithPagination;

    public function render()
    {
        $qrGroups = QrLinkGroup::ofUser(auth()->id())->paginate(10);
        return view('livewire.pages.qr-links.qr-link-index');
    }
}

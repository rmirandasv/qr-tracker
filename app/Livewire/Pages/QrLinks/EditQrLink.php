<?php

namespace App\Livewire\Pages\QrLinks;

use App\Livewire\Forms\QrLinkForm;
use App\Models\QrLink;
use Livewire\Component;

class EditQrLink extends Component
{
    public QrLink $qrLink;
    public QrLinkForm $form;

    public function mount(QrLink $qrLink)
    {
        $this->qrLink = $qrLink;
        $this->form->setQrLink($qrLink);
    }

    public function render()
    {
        return view('livewire.pages.qr-links.edit-qr-link');
    }
}

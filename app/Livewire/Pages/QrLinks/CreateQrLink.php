<?php

namespace App\Livewire\Pages\QrLinks;

use App\Livewire\Forms\QrLinkForm;
use Livewire\Component;

class CreateQrLink extends Component
{
    public QrLinkForm $form;

    public function save()
    {
        $this->form->store();

        return redirect()->route('qr-links.index');
    }

    public function render()
    {
        return view('livewire.pages.qr-links.create-qr-link');
    }
}

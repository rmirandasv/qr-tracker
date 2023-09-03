<?php

namespace App\Livewire\Pages\QrLinks;

use App\Livewire\Forms\QrLinkForm;
use Livewire\Attributes\Computed;
use Livewire\Component;

class CreateQrLink extends Component
{
    public QrLinkForm $form;

    #[Computed]
    public function uuid()
    {
        return $this->form->getQrLink()?->uuid;
    }

    public function save()
    {
        $this->form->store();

        $this->dispatch('saved');
    }

    public function render()
    {
        return view('livewire.pages.qr-links.create-qr-link');
    }
}

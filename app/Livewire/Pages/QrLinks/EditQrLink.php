<?php

namespace App\Livewire\Pages\QrLinks;

use App\Livewire\Forms\QrLinkForm;
use App\Models\QrLink;
use Livewire\Attributes\On;
use Livewire\Component;

class EditQrLink extends Component
{
    public QrLink $qrLink;
    public QrLinkForm $form;
    public $url = '';

    public function mount(QrLink $qrLink)
    {
        $this->qrLink = $qrLink;
        $this->form->setQrLink($qrLink);
        $this->url = config('app.url') . '/qrs/' . $qrLink->uuid;
    }

    public function render()
    {
        return view('livewire.pages.qr-links.edit-qr-link');
    }

    #[On('qr-downloaded')]
    public function onQrDownloaded($data)
    {
        $this->qrLink->qr()->update($data);
    }

    public function save()
    {
        $this->form->update();
        return $this->redirect(route('qr-links.index'), navigate: true);
    }

}

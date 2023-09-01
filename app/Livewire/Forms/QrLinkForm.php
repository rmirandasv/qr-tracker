<?php

namespace App\Livewire\Forms;

use App\Models\QrLink;
use Livewire\Attributes\Rule;
use Livewire\Form;
use Illuminate\Support\Str;

class QrLinkForm extends Form
{
    public ?QrLink $qrLink;

    #[Rule('nullable|exists:qr_link_groups,id')]
    public $qr_link_group_id;

    #[Rule('required')]
    public $name = '';

    #[Rule('required|url')]
    public $url = '';

    #[Rule('nullable|max:255')]
    public $description = '';

    public function setQrLink(QrLink $qrLink)
    {
        $this->qrLink = $qrLink;
        $this->qr_link_group_id = $qrLink->qr_link_group_id;
        $this->name = $qrLink->name;
        $this->url = $qrLink->url;
        $this->description = $qrLink->description;
    }

    public function store()
    {
        $this->validate();

        $uuid = Str::random(8);

        while (QrLink::where('uuid', $uuid)->exists()) {
            $uuid = Str::random(8);
        }

        QrLink::create(array_merge([
            'uuid' => $uuid,
            'user_id' => auth()->id(),
        ], $this->except('qrLink')));
    }

    public function update()
    {
        $this->validate();

        $this->qrLink->update(array_merge([
            'user_id' => auth()->id(),
        ], $this->except('qrLink')));
    }

    public function render()
    {
        return view('livewire.forms.qr-link-form');
    }
}

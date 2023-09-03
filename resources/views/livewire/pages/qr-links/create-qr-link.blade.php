<div>
    @if ($this->uuid)
        <livewire:components.qr.qr-generator :input="$this->uuid" />
    @endif
    <x-forms.qr-link-form />
</div>

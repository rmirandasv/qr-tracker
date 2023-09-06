<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit QR Link') }}
        </h2>
    </x-slot>
    <div class="flex flex-col space-y-2">
        <x-forms.qr-link-form :qrLink="$qrLink" />
        <livewire:components.qr.qr-generator :input="$url" :size="$qrLink->qr->size" :margin="$qrLink->qr->margin" :label="$qrLink->qr->label" :label-font-size="$qrLink->qr->label_size" />
    </div>
</div>

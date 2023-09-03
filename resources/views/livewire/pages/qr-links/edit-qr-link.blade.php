<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit QR Link') }}
        </h2>
    </x-slot>
    <div class="flex flex-col">
        <livewire:components.qr.qr-generator :input="$qrLink->uuid" />
        <x-forms.qr-link-form :qrLink="$qrLink" />
    </div>
</div>

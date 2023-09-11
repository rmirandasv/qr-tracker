<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit QR Link') }}
        </h2>
    </x-slot>
    <x-slot name="breadcrumbs">
        <x-breadcrumb :links="[
            [
                'url' => route('dashboard'),
                'label' => __('Dashboard'),
            ],
            [
                'url' => route('qr-links.index'),
                'label' => __('QR Links'),
            ],
            [
                'url' => route('qr-links.show', $qrLink),
                'label' => $qrLink->name,
            ],
            [
                'url' => route('qr-links.edit', $qrLink),
                'label' => __('Edit QR Link'),
            ],
        ]" />
    </x-slot>
    <div class="flex flex-col">
        <h3 class="text-lg font-medium leading-6 text-gray-900 my-4">
            {{ __('Edit QR Link') }}
        </h3>
        <div class="flex flex-col space-y-2">
            <x-forms.qr-link-form :qrLink="$qrLink" />
            <livewire:components.qr.qr-generator :input="$url" :size="$qrLink->qr->size" :margin="$qrLink->qr->margin" :label="$qrLink->qr->label"
                :label-font-size="$qrLink->qr->label_size" />
        </div>
    </div>
</div>

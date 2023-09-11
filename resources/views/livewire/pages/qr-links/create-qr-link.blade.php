<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New QR Link') }}
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
                'url' => route('qr-links.create'),
                'label' => __('New QR Link'),
            ],
        ]" />
    </x-slot>
    <div class="flex flex-col">
        <h3 class="text-lg font-medium leading-6 text-gray-900 my-4">
            {{ __('Create new QR Link') }}
        </h3>
        <x-forms.qr-link-form />
    </div>
</div>

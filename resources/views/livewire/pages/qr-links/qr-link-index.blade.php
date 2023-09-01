<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('QR Links') }}
        </h2>
    </x-slot>

    <div class="flex flex-col">
        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-bold">{{ __('QR Links') }}</h1>
            <a href="{{ route('qr-links.create') }}" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">{{ __('Create') }}</a>
        </div>
    </div>

</div>
